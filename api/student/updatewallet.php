<?php
    include_once 'connect.inc.php';
    $order_id = $_GET['order_id'];

    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders/$order_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "x-api-version: 2022-09-01",
        "x-client-id: 5114158e84d301ed7f054ee9f14115",
        "x-client-secret: TEST4bf12fc3ea51f7b2ca537411832d3d4b9becc883"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $result = json_decode($response, true);
    $status = $result['order_status'];

    if ($err)
    {
        header("Location: test.bluepen.co.in/submit/plagiarism-check/checkout/failure");
        exit();
        return;
    }
    else
    {
    // echo $response;
        if($status == "PAID")
        {
            $id_explode = explode("-", $order_id);
            $order_id_for_db = $id_explode[1];
            // var_dump($order_id_for_db);

            // $get_order_details_sql = "SELECT * FROM user_buy_coins WHERE order_id = '$order_id_for_db'";
            // $get_order_details_result = mysqli_query($conn, $get_order_details_sql);
            // $get_order_details_row = mysqli_fetch_assoc($get_order_details_result);

            // $user_id = $get_order_details_row['user_id'];
            // echo "user_id: ".$user_id;
            // echo "<br>";

            // $update_order_details_sql = "UPDATE `user_buy_coins` SET `status_update` = 'PAID', `updated_data` = '$response', `update_time` = NOW() WHERE order_id = '$order_id_for_db'";
            // $update_order_details_result = mysqli_query($conn, $update_order_details_sql);

            // $get_user_wallet_sql = "SELECT * FROM users WHERE id = '$user_id'";
            // $get_user_wallet_result = mysqli_query($conn, $get_user_wallet_sql);
            // $get_user_wallet_row = mysqli_fetch_assoc($get_user_wallet_result);
            // echo "existing coins: ".$get_user_wallet_row['wallet_coins'];
            // echo "<br>";

            // $amount = $result['order_amount'];
            // if($amount == 40)
            //     $coins = 50;
            // else if($amount == 80)
            //     $coins = 120;
            // else if($amount == 150)
            //     $coins = 225;

            // echo "amount paid: ".$amount;
            // echo "<br>";
            // echo "coins to add: ".$coins;
            // echo "<br>";

            // $user_wallet = $get_user_wallet_row['wallet_coins'];
            // $user_wallet = $user_wallet + $coins;
            // echo "updated wallet: ".$user_wallet;

            // $update_user_wallet_sql = "UPDATE `users` SET `wallet_coins` = '$user_wallet' WHERE id = '$user_id'";
            // $update_user_wallet_result = mysqli_query($conn, $update_user_wallet_sql);

            // $user_wallet_transaction_sql = "INSERT INTO `user_wallet_transaction` (`user_id`, `details`, `transaction`, `date_time`) VALUES ('$user_id', 'CREDIT', '$coins', NOW())";
            // $user_wallet_transaction_result = mysqli_query($conn, $user_wallet_transaction_sql);

            echo json_encode($result);
            header("Location: test.bluepen.co.in/submit/plagiarism-check/checkout/success");
            exit();
            return;
        }

        else
        {
            // $id_explode = explode("-", $order_id);
            // $order_id_for_db = $id_explode[1];

            // $update_order_details_sql = "UPDATE `user_buy_coins` SET `status_update` = 'FAILED', `updated_data` = '$response', `update_time` = NOW() WHERE order_id = '$order_id_for_db'";
            // $update_order_details_result = mysqli_query($conn, $update_order_details_sql);

            echo json_encode($result);
            header("Location: test.bluepen.co.in/submit/plagiarism-check/checkout/failure");
            exit();
            return;
        }
        


    }
?>