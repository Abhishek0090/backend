<?php

    include '../connect.php';
    
    $order_id = $_GET['order_id'];
    $number_of_files = $_GET['number_of_files'];

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $merchantId = 'BLUEPENONLINE'; // sandbox or test merchantId
    $apiKey = "7572ae3b-936a-43a0-b3a1-653c2ea60c13"; // sandbox or test APIKEY
    $salt_index = 1;

    $string = "/pg/v1/status/$merchantId/$order_id";
    $payload = $string.$apiKey;
    $sha256 = hash("sha256", $payload);
    $final_x_header = $sha256 . '###' . $salt_index;

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/status/$merchantId/$order_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => [
            "Content-Type:application/json",
            "X-VERIFY:".$final_x_header,
            "X-MERCHANT-ID:".$merchantId,
            // "accept: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $decoded_response = json_decode($response);
    
    if($decoded_response->code == "PAYMENT_SUCCESS")
    {
        $redirect = "https://bluepen.co.in/submit/checkplagiarism/checkout/success";
    }
    else
    {
        $redirect = "https://bluepen.co.in/submit/checkplagiarism/checkout/failure";
    }

    $order_id = explode("-", $order_id)[1];

    $update_order_data_sql = "UPDATE `assignment_plagiarism_check` SET `status` = '$decoded_response->code', `order_pay_result` = '$response', `update_time` = '$now' WHERE `id` = '$order_id'";
    $update_order_data_result = mysqli_query($conn, $update_order_data_sql);

    header("Location: $redirect");
    exit();

    // echo json_encode(array(
    //     "response" => json_decode($response),
    //     "status" => $decoded_response->code,
    //     "err" => $err,
    //     "order_id" => $order_id,
    //     "number_of_files" => $number_of_files,
    //     "merchantId" => $merchantId,
    //     "apiKey" => $apiKey,
    //     "string" => $string,
    //     "payload" => $payload,
    //     "sha256" => $sha256,
    //     "final_x_header" => $final_x_header,
    //     "redirect" => $redirect,
    //     "sql" => $update_order_data_sql
    // ));

?>


