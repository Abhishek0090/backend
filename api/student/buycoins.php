<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    // $coins = $data['coins'];
    $add_coins = $data['coins'];

    // get current coins of user
    // save order in db
    // redirect to payment gateway
    // if payment success then add coins to user account
    // add transaction in wallet history
    // return success array
    // if fail then return failed array

    $get_wallet_coins_sql = "SELECT `wallet` FROM `users` WHERE `id` = '$user_id'";
    $get_wallet_coins_result = mysqli_query($conn, $get_wallet_coins_sql);
    $get_wallet_coins_row = mysqli_fetch_assoc($get_wallet_coins_result);
    $coins = $get_wallet_coins_row['wallet'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $new_coins = $coins + $add_coins;

    $insert_order_sql = "INSERT INTO `user_wallet_transactions` (`user_id`, `details`, `coins`, `date_time`) VALUES ('$user_id', 'Bought', '$add_coins', '$now')";
    $insert_order_result = mysqli_query($conn, $insert_order_sql);

    $update_user_wallet_sql = "UPDATE `users` SET `wallet` = '$new_coins' WHERE `id` = '$user_id'";
    $update_user_wallet_result = mysqli_query($conn, $update_user_wallet_sql);
    
    // echo json_encode("Buy Coins");
    $return_data = array(
        'user_id' => $user_id,
        'coins' => $coins,
        'add_coins' => $add_coins,
        'new_coins' => $new_coins,
        'status' => 200,
        // 'data' => $data
    );

    echo json_encode($return_data);

?>  