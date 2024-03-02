<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // $data = json_decode(file_get_contents("php://input"), true);
    // $user_id = $data['user_id'];
    // $writer_id = $data['writer_id'];

    $user_id = $_GET['user_id'];
    $writer_id = $_GET['writer_id'];

    // fetch all details of writer from writer id
    // check if user has bought writer contact
    // if yes then check contact expiry
    // if contact active show view phonebook button 
    // in all else cases show get contact button
    // return writer details array with button status

    $get_writer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = $writer_id";
    $get_writer_details_result = mysqli_query($conn, $get_writer_details_sql);
    $get_writer_details_data = mysqli_fetch_assoc($get_writer_details_result);
    
    $writer_id = $get_writer_details_data['id'];
    $writer_firstname = $get_writer_details_data['firstname'];

    $writer_specific_details_sql = "SELECT * FROM `freelancers_writer` WHERE `freelancer_id` = $writer_id";
    $writer_specific_details_result = mysqli_query($conn, $writer_specific_details_sql);
    $writer_specific_details_data = mysqli_fetch_assoc($writer_specific_details_result);

    $writer_domains = $writer_specific_details_data['domains'];
    $writer_domains = json_decode($writer_domains);

    $writer_bio = $writer_specific_details_data['bio'];
    $writer_profile_photo = $writer_specific_details_data['profile_photo'];

    if($writer_specific_details_data['writing'] == 1)
    {
        $writer_capacity = $writer_specific_details_data['writing_capacity'];
        $writing_1day_cost = $writer_specific_details_data['writing_1day_cost'];
        $writing_2day_cost = $writer_specific_details_data['writing_2day_cost'];
        $writing_3day_cost = $writer_specific_details_data['writing_3day_cost'];
        $writing_sample = $writer_specific_details_data['writing_sample'];

        $writing_array = array(
            'details' => "Writing Details",
            'writer_capacity' => $writer_capacity,
            'writing_1day_cost' => $writing_1day_cost,
            'writing_2day_cost' => $writing_2day_cost,
            'writing_3day_cost' => $writing_3day_cost,
            'sample_file' => $writing_sample
        );
    }

    if($writer_specific_details_data['diagram'] == 1)
    {
        $diagram_cost = $writer_specific_details_data['diagram_cost'];
        $diagram_sample = $writer_specific_details_data['diagram_sample'];

        $diagram_array = array(
            'details' => "Diagram Details",
            'diagram_cost' => $diagram_cost,
            'sample_file' => $diagram_sample
        );
    }

    if($writer_specific_details_data['ed'] == 1)
    {
        $ed_cost = $writer_specific_details_data['ed_cost'];
        $ed_sample = $writer_specific_details_data['ed_sample'];

        $ed_array = array(
            'details' => "Editing Details",
            'ed_cost' => $ed_cost,
            'sample_file' => $ed_sample
        );
    }

    if($writer_specific_details_data['typing'] == 1)
    {
        $typing_cost = $writer_specific_details_data['typing_cost'];
        $typing_speed = $writer_specific_details_data['typing_speed'];

        $typing_array = array(
            'details' => "Typing Details",
            'typing_cost' => $typing_cost,
            'typing_speed' => $typing_speed
        );
    }

    if($writer_specific_details_data['art'] == 1)
    {
        $art_type_of_models = $writer_specific_details_data['art_type_of_models'];
        $art_cost = $writer_specific_details_data['art_cost'];
        $art_sample = $writer_specific_details_data['art_sample'];

        $art_array = array(
            'details' => "Art Details",
            'art_type_of_models' => $art_type_of_models,
            'art_cost' => $art_cost,
            'sample_file' => $art_sample
        );
    }

    $check_if_user_bought_writer_sql = "SELECT * FROM `user_bought_writer` WHERE `user_id` = $user_id AND `writer_id` = $writer_id ORDER BY `id` DESC LIMIT 1";
    $check_if_user_bought_writer_result = mysqli_query($conn, $check_if_user_bought_writer_sql);
    $check_if_user_bought_writer_number = mysqli_num_rows($check_if_user_bought_writer_result);
    if($check_if_user_bought_writer_number == 1)
    {
        // check for contact expiry
        date_default_timezone_set('Asia/Kolkata');
        $now = date("d-m-Y H:i:s");
        $check_if_user_bought_writer_number_data = mysqli_fetch_assoc($check_if_user_bought_writer_result);
        $expiry = $check_if_user_bought_writer_number_data['expires_on'];
        if($now < $expiry)
        {
            // show view phonebook button
            $status = "View Contact";
        }
        else
        {
            // show get contact button
            $status = "Get Contact";
        }
    }
    else
    {
        // show get contact button
        $status = "Get Contact";
    }

    $get_wallet_coins_sql = "SELECT `wallet` FROM `users` WHERE `id` = '$user_id'";
    $get_wallet_coins_result = mysqli_query($conn, $get_wallet_coins_sql);
    $get_wallet_coins_row = mysqli_fetch_assoc($get_wallet_coins_result);
    $coins = $get_wallet_coins_row['wallet'];

    $check_number_of_times_user_bought_contact_sql = "SELECT COUNT(*) AS `count` FROM `user_bought_writer` WHERE `user_id` = '$user_id'";
    $check_number_of_times_user_bought_contact_result = mysqli_query($conn, $check_number_of_times_user_bought_contact_sql);
    $check_number_of_times_user_bought_contact_row = mysqli_fetch_assoc($check_number_of_times_user_bought_contact_result);
    $count = $check_number_of_times_user_bought_contact_row['count'];

    if($count < 2)
    {
        $cost = 50;
    }
    else
    {
        $cost = 40;
    }

    if($coins < $cost)
    {
        $buy_status = "Insufficient Coins";
    }
    else
    {
        $buy_status = "Buy";
    }

    $response = array(
        // 'user_id' => $user_id,
        'writer_id' => $writer_id,
        'writer_firstname' => $writer_firstname,
        'writer_bio' => $writer_bio,
        'writer_profile_photo' => $writer_profile_photo,
        'writer_domains' => $writer_domains,
        'writing' => $writing_array,
        'diagram' => $diagram_array,
        'ed' => $ed_array,
        'typing' => $typing_array,
        'art' => $art_array,
        'contact_status' => $status,
        'user_wallet' => $coins,
        'cost' => $cost,
        // 'buy_status' => $buy_status,
    );
    
    echo json_encode($response);

?>  