<?php

    include_once 'old_connect.php';

    $users_data = array();

    $get_all_users_from_old_database = "SELECT * FROM `users`";
    $get_all_users_from_old_database_result = mysqli_query($old_conn, $get_all_users_from_old_database);


    while ($get_all_users_from_old_database_row = mysqli_fetch_array($get_all_users_from_old_database_result))
    {
        $users_array = array (
            'id' => $get_all_users_from_old_database_row['id'],
            'firstname' => $get_all_users_from_old_database_row['firstname'],
            'lastname' => $get_all_users_from_old_database_row['lastname'],
            'college' => $get_all_users_from_old_database_row['college'],
            'email' => $get_all_users_from_old_database_row['email'],
            'email_verified' => $get_all_users_from_old_database_row['email_verified'],
            'country' => $get_all_users_from_old_database_row['country'],
            'mobile' => $get_all_users_from_old_database_row['mobile'],
            'address' => $get_all_users_from_old_database_row['address'],
            'wallet_coins' => $get_all_users_from_old_database_row['wallet_coins'],
            'date_of_birth' => $get_all_users_from_old_database_row['date_of_birth'],
            'password' => $get_all_users_from_old_database_row['password'],
            'date_of_submission' => $get_all_users_from_old_database_row['date_of_submission'],
            'agreed_to_terms' => $get_all_users_from_old_database_row['agreed'],
        );

        array_push($users_data, $users_array);
    }

    $fp = fopen('users_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($users_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>