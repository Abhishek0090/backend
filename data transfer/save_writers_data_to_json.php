<?php

    include_once 'old_connect.php';

    $freelancers_data = array();

    $get_all_freelancers_from_old_database = "SELECT * FROM `writer`";
    $get_all_freelancers_from_old_database_result = mysqli_query($old_conn, $get_all_freelancers_from_old_database);


    while ($get_all_freelancers_from_old_database_row = mysqli_fetch_array($get_all_freelancers_from_old_database_result))
    {
        $freelancers_array = array (
            'id' => $get_all_freelancers_from_old_database_row['id'],
            'firstname' => $get_all_freelancers_from_old_database_row['firstname'],
            'lastname' => $get_all_freelancers_from_old_database_row['lastname'],
            'gender' => $get_all_freelancers_from_old_database_row['gender'],
            'country' => $get_all_freelancers_from_old_database_row['country'],
            'mobile' => $get_all_freelancers_from_old_database_row['mobile_number'],
            'whatsapp' => $get_all_freelancers_from_old_database_row['whatsapp_number'],
            'mobile_number' => $get_all_freelancers_from_old_database_row['mobile'],
            'email' => $get_all_freelancers_from_old_database_row['email'],
            'file' => $get_all_freelancers_from_old_database_row['file'],
            'diagram_sample' => $get_all_freelancers_from_old_database_row['diagram_sample'],
            'ed_sample' => $get_all_freelancers_from_old_database_row['ed_sample'],
            'art_sample' => $get_all_freelancers_from_old_database_row['art_sample'],
            'password' => $get_all_freelancers_from_old_database_row['password'],
            'address' => $get_all_freelancers_from_old_database_row['address'],
            'street' => $get_all_freelancers_from_old_database_row['street'],
            'city' => $get_all_freelancers_from_old_database_row['city'],
            'state' => $get_all_freelancers_from_old_database_row['state'],
            'postalcode' => $get_all_freelancers_from_old_database_row['postalcode'],
            'bio' => $get_all_freelancers_from_old_database_row['bio'],
            'assignment_type' => $get_all_freelancers_from_old_database_row['assignment_type'],
            'college' => $get_all_freelancers_from_old_database_row['college'],
            'date_of_submission' => $get_all_freelancers_from_old_database_row['date_of_submission'],
            'approval' => $get_all_freelancers_from_old_database_row['approval'],
            'amount' => $get_all_freelancers_from_old_database_row['amount'],
            'writer_capacity' => $get_all_freelancers_from_old_database_row['writer_capacity'],
            'diagram_cost' => $get_all_freelancers_from_old_database_row['diagram_cost'],
            'ed_cost' => $get_all_freelancers_from_old_database_row['ed_cost'],
            'art_cost' => $get_all_freelancers_from_old_database_row['art_cost'],
            'typing_cost' => $get_all_freelancers_from_old_database_row['typing_cost'],
            'short_cost' => $get_all_freelancers_from_old_database_row['short_cost'],
            'medium_cost' => $get_all_freelancers_from_old_database_row['medium_cost'],
            'long_cost' => $get_all_freelancers_from_old_database_row['long_cost'],
            'coins' => $get_all_freelancers_from_old_database_row['coins'],
        );

        array_push($freelancers_data, $freelancers_array);
    }

    $fp = fopen('writers_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($freelancers_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>