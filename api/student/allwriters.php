<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    
    // fetch all approved writers from table
    // create empty array
    // loop over all approved writers
    // enter writer details array of oldest writer in array
    // append writers in descending order of id
    // return array

    $map_array = array();

    $get_all_writers_map_sql = "SELECT * FROM `freelancers_map` WHERE `writer` = 1 ORDER BY id DESC";
    $get_all_writers_map_result = mysqli_query($conn, $get_all_writers_map_sql);
    while($get_all_writers_map_data = mysqli_fetch_assoc($get_all_writers_map_result))
    {
        $writer_freelancer_id = $get_all_writers_map_data['id'];
        $writer_email = $get_all_writers_map_data['email'];
        $writer_country_name = $get_all_writers_map_data['country_name'];
        $writer_number = $get_all_writers_map_data['number'];
        $writer_first_name = $get_all_writers_map_data['firstname'];
        $writer_last_name = $get_all_writers_map_data['lastname'];
        $writer_gender = $get_all_writers_map_data['gender'];
        $writer_address = $get_all_writers_map_data['address'];
        $writer_street = $get_all_writers_map_data['street'];
        $writer_city = $get_all_writers_map_data['city'];
        $writer_state = $get_all_writers_map_data['state'];
        $writer_pincode = $get_all_writers_map_data['pincode'];

        $fetch_writer_details_sql = "SELECT * FROM `freelancers_writer` WHERE `freelancer_id` = $writer_freelancer_id";
        $fetch_writer_details_result = mysqli_query($conn, $fetch_writer_details_sql);
        $fetch_writer_details_data = mysqli_fetch_assoc($fetch_writer_details_result);

        $writer_domains = $fetch_writer_details_data['domains'];
        $writer_domains = json_decode($writer_domains);

        $details_array = array();
        $cost_array = array();

        if($fetch_writer_details_data['writing'] == 1)
        {
            $writer_capacity = $fetch_writer_details_data['writing_capacity'];
            $writing_1day_cost = $fetch_writer_details_data['writing_1day_cost'];
            $writing_2day_cost = $fetch_writer_details_data['writing_2day_cost'];
            $writing_3day_cost = $fetch_writer_details_data['writing_3day_cost'];
            $writing_sample = $fetch_writer_details_data['writing_sample'];

            $writing_array = array(
                'details' => "Writing Details",
                'writer_capacity' => $writer_capacity,
                'writing_1day_cost' => $writing_1day_cost,
                'writing_2day_cost' => $writing_2day_cost,
                'writing_3day_cost' => $writing_3day_cost,
                'writing_sample' => $writing_sample,
            );

            array_push($details_array, $writing_array);

            array_push($cost_array, $writing_1day_cost);
            array_push($cost_array, $writing_2day_cost);
            array_push($cost_array, $writing_3day_cost);
        }

        if($fetch_writer_details_data['diagram'] == 1)
        {
            $diagram_cost = $fetch_writer_details_data['diagram_cost'];
            $diagram_sample = $fetch_writer_details_data['diagram_sample'];

            $diagram_array = array(
                'details' => "Diagram Details",
                'diagram_cost' => $diagram_cost,
                'diagram_sample' => $diagram_sample,
            );

            array_push($details_array, $diagram_array);

            array_push($cost_array, $diagram_cost);
        }

        if($fetch_writer_details_data['ed'] == 1)
        {
            $ed_cost = $fetch_writer_details_data['ed_cost'];
            $ed_sample = $fetch_writer_details_data['ed_sample'];

            $ed_array = array(
                'details' => "ED Details",
                'ed_cost' => $ed_cost,
                'ed_sample' => $ed_sample,
            );

            array_push($details_array, $ed_array);

            array_push($cost_array, $ed_cost);
        }

        if($fetch_writer_details_data['typing'] == 1)
        {
            $typing_cost = $fetch_writer_details_data['typing_cost'];
            $typing_speed = $fetch_writer_details_data['typing_speed'];

            $typing_array = array(
                'details' => "Typing Details",
                'typing_cost' => $typing_cost,
                'typing_speed' => $typing_speed,
            );

            array_push($details_array, $typing_array);

            array_push($cost_array, $typing_cost);
        }

        if($fetch_writer_details_data['art'] == 1)
        {
            $art_type_of_models = $fetch_writer_details_data['art_type_of_models'];
            $art_cost = $fetch_writer_details_data['art_cost'];
            $art_sample = $fetch_writer_details_data['art_sample'];

            $art_array = array(
                'details' => "Art Details",
                'art_type_of_models' => $art_type_of_models,
                'art_cost' => $art_cost,
                'art_sample' => $art_sample,
            );

            array_push($details_array, $art_array);

            array_push($cost_array, $art_cost);
        }

        $writer_bio = $fetch_writer_details_data['bio'];
        $writer_profile_photo = $fetch_writer_details_data['profile_photo'];

        sort($cost_array);

        $freelancer_array = array(
            'writer_id' => $writer_freelancer_id,
            // 'writer_email' => $writer_email,
            // 'writer_country_name' => $writer_country_name,
            // 'writer_number' => $writer_number,
            'writer_first_name' => $writer_first_name,
            // 'writer_last_name' => $writer_last_name,
            'writer_gender' => $writer_gender,
            // 'writer_address' => $writer_address,
            // 'writer_street' => $writer_street,
            'writer_city' => $writer_city,
            'writer_state' => $writer_state,
            // 'writer_pincode' => $writer_pincode,
            'writer_domains' => $writer_domains,
            'writer_bio' => $writer_bio,
            'writer_profile_photo' => $writer_profile_photo,
            // 'writer_details' => $details_array,
            'writer_starting_from' => $cost_array[0],
        );

        array_push($map_array, $freelancer_array);
    }
    
    $response = array(
        'get_all_writers_map_sql' => $get_all_writers_map_sql,
        'map_array' => $map_array,
        'cost_array' => $cost_array,
        'starting_from' => $starting_from,
    );

    // echo json_encode($response);
    echo json_encode($map_array);

?>  