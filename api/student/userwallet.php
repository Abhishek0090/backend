<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $user_id = $data['user_id'];
    $user_id = $_GET['id'];

    // fetch total user coins from user details
    // fetch all transactions from wallet history
    // return array of coins and transactions
    
    $get_wallet_coins = "SELECT `wallet` FROM `users` WHERE `id` = '$user_id'";
    $get_wallet_coins_result = mysqli_query($conn, $get_wallet_coins) or die(mysqli_error($conn));
    $get_wallet_coins_row = mysqli_fetch_assoc($get_wallet_coins_result);
    $coins = $get_wallet_coins_row['wallet'];

    $get_wallet_transactions = "SELECT * FROM `user_wallet_transactions` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
    $get_wallet_transactions_result = mysqli_query($conn, $get_wallet_transactions);
    $transactions = array();
    while($get_wallet_transactions_row = mysqli_fetch_assoc($get_wallet_transactions_result)) {
        // $transactions[] = $get_wallet_transactions_row;
        // $transactions['type'] = 'Credit';
        $transactions[] = array(
            'id' => $get_wallet_transactions_row['id'],
            'user_id' => $get_wallet_transactions_row['user_id'],
            'details' => $get_wallet_transactions_row['details'],
            'coins' => $get_wallet_transactions_row['coins'],
            'type' => 'Credit',
            // 'transaction_id' => $get_wallet_transactions_row['transaction_id'],
            // 'type' => $get_wallet_transactions_row['type'],
            // 'amount' => $get_wallet_transactions_row['amount'],
            'date_time' => $get_wallet_transactions_row['date_time'],
            // 'time' => $get_wallet_transactions_row['time']
        );
    }

    $return_data = array(
        'user_id' => $user_id,
        'coins' => $coins,
        // 'type' => 'Credit',
        'transactions' => $transactions,
        // 'status' => 200,
        // 'data' => $data
    );

    // echo json_encode(array('coins' => $coins));

    echo json_encode($return_data);

?>