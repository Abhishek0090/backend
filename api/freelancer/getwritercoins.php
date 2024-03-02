<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $writer_id = $data['writer_id'];

    // get writer coins from writer table
    // get writer transactions from writer transactions table
    // return writer coins and writer transactions in single array
    // array structure:
    // array(
    //     'writer_coins' => writer_coins,
    //     'writer_transactions' => array(
    //         array(
    //             'transaction_id' => transaction_id,
    //             'transaction_date' => transaction_date,
    //             'transaction_amount' => transaction_amount,
    //             'transaction_type' => transaction_type,
    //             'transaction_status' => transaction_status
    //         ),
    //         array(
    //             'transaction_id' => transaction_id,
    //             'transaction_date' => transaction_date,
    //             'transaction_amount' => transaction_amount,
    //             'transaction_type' => transaction_type,
    //             'transaction_status' => transaction_status
    //         ),
    //         array(
    //             'transaction_id' => transaction_id,
    //             'transaction_date' => transaction_date,
    //             'transaction_amount' => transaction_amount,
    //             'transaction_type' => transaction_type,
    //             'transaction_status' => transaction_status
    //         )
    //     )
    // )
    

?>