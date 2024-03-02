<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $submit = $data['submit'];
    $assignment_id = $data['assignment_id'];

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $get_files_String_sql = "SELECT * FROM `assignment_plag_check` WHERE `id` = '$assignment_id'";
    $get_files_String_result = mysqli_query($conn, $get_files_String_sql);
    $get_files_String_row = mysqli_fetch_assoc($get_files_String_result);

    if($get_files_String_row['amount'] != 0)
    {
        $order_data = $get_files_String_row['create_order_result'];
        $order_data = json_decode($order_data, true);
        $code = $order_data['code'];
        $payUrl = $order_data['data']['instrumentResponse']['redirectInfo']['url'];

        echo json_encode(array(
            "status" => 200,
            // "order_data" => $order_data,
            // "code" => $code,
            "link" => $payUrl,
            // "message" => "Order Already Created"
        ));
        return;
    }
    
    $user_name = $get_files_String_row['name'];
    $user_number = $get_files_String_row['number'];

    $files_string = $get_files_String_row['files'];
    $assignment_files = explode('_$_', $files_string);
    $number_of_files = count($assignment_files);
    $number_of_files -= 1;

    $price = 200;
    $amount = $price * $number_of_files;
    
    $dummy_array = array(
        "status" => 200,
        "assignment_id" => $assignment_id,
        "user_id" => $assignment_id,
        "user_name" => $user_name,
        "user_email" => $user_email,
        "user_number" => $user_number,
        "now" => $now,
        "files_string" => $files_string,
        "assignment_files" => $assignment_files,
        "number_of_files" => $number_of_files,
        "price" => $price,
        "amount" => $amount
    );
    
    $user_id = "P-".$assignment_id;

    $order_id = "P-".$assignment_id;
    $order_amount = $amount;
    $order_note = "Plag Check";
    $order_currency = "INR";
    $order_id_for_db = $assignment_id;

    
    $merchantId = 'BLUEPENONLINE'; // sandbox or test merchantId
    $apiKey = "7572ae3b-936a-43a0-b3a1-653c2ea60c13"; // sandbox or test APIKEY
    $redirectUrl = 'https://bluepen.co.in/api/student/orderpay.php?order_id='.$order_id.'&number_of_files='.$number_of_files.'';
    
    // Set transaction details
    $name = "Bluepen";
    $email = "bhavyaharia100@gmail.com";
    $mobile = 9619305482;
    // $pay_amount = 1; // amount in INR
    $pay_amount = $amount; // amount in INR
    $description = 'Payment for Product/Service';
    
    $paymentData = array(
        'merchantId' => $merchantId,
        'merchantTransactionId' => $order_id, // test transactionID
        "merchantUserId" => $merchantId,
        'amount' => $pay_amount*100,
        'redirectUrl' => $redirectUrl,
        'redirectMode'=> "POST",
        'callbackUrl' => $redirectUrl,
        "mobileNumber" => $mobile,
        "paymentInstrument" => array(    
            "type" => "PAY_PAGE",
        )
    );

    $payloadMain = base64_encode(json_encode($paymentData));
    $salt_index = 1; //key index 1
    $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    $sha256 = hash("sha256", $payload);
    $final_x_header = $sha256 . '###' . $salt_index;
    $request = json_encode(array('request'=>$payloadMain));

    $curl = curl_init();
    curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $request,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "X-VERIFY: " . $final_x_header,
        "accept: application/json"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err)
    {
        echo "cURL Error #:" . $err;
    } 
    else
    {
        $res = json_decode($response);
    
        if(isset($res->success) && $res->success=='1')
        {
        $paymentCode=$res->code;
        $paymentMsg=$res->message;
        $payUrl=$res->data->instrumentResponse->redirectInfo->url;
        }
    }

    $payment_session_id = $res->data->paymentSessionId;

    $update_order_data_sql = "UPDATE `assignment_plag_check` SET `amount` = '$amount', `phonepe_order_id` = '$payment_session_id', `create_order_result` = '$response' WHERE `id` = '$assignment_id'";
    $update_order_data_result = mysqli_query($conn, $update_order_data_sql);
    
    echo json_encode(array(
        "status" => 200,
        "data" => $dummy_array,
        "response" => $response,
        "payment_session_id" => $payment_session_id,
        "sql_result" => $update_order_data_result,
        "link" => $payUrl,
    ));

?>