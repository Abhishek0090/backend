<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include 'connect.php';

    $user_data = array();
    $get_users_sql = "SELECT * FROM `users`";
    $get_users_result = mysqli_query($conn, $get_users_sql);
    while($get_users_row = mysqli_fetch_assoc($get_users_result))
    {
        $user = $get_users_row;
        array_push($user_data, $user);
    }

    echo json_encode($user_data);
?>