<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $user_id = $_GET['user_id'];
    $writer_id = $_GET['writer_id'];

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
        echo json_encode("Insufficient Coins");
        exit();
    }
    else
    {
        // buy contact
        date_default_timezone_set("Asia/Kolkata");
        $now = date("Y-m-d H:i:s", strtotime("now"));
        $expiry = date("Y-m-d H:i:s", strtotime("now +7 days"));

        $updated_wallet = $coins - $cost;
        $insert_order_sql = "INSERT INTO `user_wallet_transactions` (`user_id`, `details`, `coins`, `date_time`) VALUES ('$user_id', 'Bought', '$cost', '$now')";
        $insert_order_result = mysqli_query($conn, $insert_order_sql);

        $update_user_wallet_sql = "UPDATE `users` SET `wallet` = '$updated_wallet' WHERE `id` = '$user_id'";
        $update_user_wallet_result = mysqli_query($conn, $update_user_wallet_sql);

        $insert_user_bought_writer_sql = "INSERT INTO `user_bought_writer` (`user_id`, `writer_id`, `bought_on`, `expires_on`) VALUES ('$user_id', '$writer_id', '$now', '$expiry')";
        $insert_user_bought_writer_result = mysqli_query($conn, $insert_user_bought_writer_sql);
    }
    
    
    
    // echo json_encode("Buy Coins");

    $return_data = array(
        'user_id' => $user_id,
        'coins' => $coins,
        'count' => $count,
        'cost' => $cost,
        'now' => $now,
        'expiry' => $expiry,
        'updated_wallet' => $updated_wallet,
        // 'insert_order_sql' => $insert_order_sql,
        // 'update_user_wallet_sql' => $update_user_wallet_sql,
        // 'insert_user_bought_writer_sql' => $insert_user_bought_writer_sql,
        // 'data' => $data
    );

    echo json_encode($return_data);

?>  