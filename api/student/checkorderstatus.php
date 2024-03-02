<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $submit = $data['submit'];
    $order_id = $data['order_id'];

    // echo json_encode($data);

    // $order_id = $_GET['order_id'];

    // echo $order_id;
    // echo json_encode($order_id);

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders/U-$order_id",
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
    $order_amount = $result['order_amount'];
    $order_status = $result['order_status'];

    $update_order_details_sql = "UPDATE `assignment_plagiarism_check` SET `amount` = '$order_amount', `status` = '$order_status', `order_pay_result` = '$response', `update_time` = '$now' WHERE `assignment_id` = '$order_id'";
    $update_order_details_result = mysqli_query($conn, $update_order_details_sql);

    if ($err)
    {
        echo "cURL Error #:" . $err;
    } 
    else 
    {
    // echo $response;
    if($order_status == "PAID")
    {
        echo json_encode(array(
            "status" => 200,
            // "data" => $result,
            // "response" => $response,
            'amount' => $order_amount,
            'order_status' => $order_status,
            // 'sql' => $update_order_details_sql,
        ));
    }
    else if($order_status == "ACTIVE")
    {
        $payment_session_id  =  $result['payment_session_id'];
        echo json_encode(array(
            "status" => 200,
            // "data" => $result,
            // "response" => $response,
            'amount' => $order_amount,
            'order_status' => $order_status,
            // 'sql' => $update_order_details_sql,
            'link' => "https://test.bluepen.co.in/api/student/orderpay.php?paymentid=$payment_session_id"
        ));
    }
    
    
    }
    
?>