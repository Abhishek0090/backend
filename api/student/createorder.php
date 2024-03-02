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

    // $get_user_id_sql = "SELECT * FROM `assignment_plagiarism_check` WHERE `id` = '$assignment_id'";
    // $get_user_id_result = mysqli_query($conn, $get_user_id_sql);
    // $get_user_id_row = mysqli_fetch_assoc($get_user_id_result);
    // $user_id = $get_user_id_row['user_id'];

    $get_files_String_sql = "SELECT * FROM `assignment_plagiarism_check` WHERE `id` = '$assignment_id'";
    $get_files_String_result = mysqli_query($conn, $get_files_String_sql);
    $get_files_String_row = mysqli_fetch_assoc($get_files_String_result);
    $user_id = $get_files_String_row['user_id'];

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
    
    $files_string = $get_files_String_row['files'];
    $assignment_files = explode('_$_', $files_string);
    $number_of_files = count($assignment_files);
    $number_of_files -= 1;

    $price = 200;
    $amount = $price * $number_of_files;

    $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $get_user_details_result = mysqli_query($conn, $get_user_details_sql);
    $get_user_details_row = mysqli_fetch_assoc($get_user_details_result);

    $user_firstname = $get_user_details_row['firstname'];
    $user_lastname = $get_user_details_row['lastname'];
    $user_name = $user_firstname." ".$user_lastname;
    $user_email = $get_user_details_row['email'];
    $user_number = $get_user_details_row['number'];
    
    // $dummy_array = array(
    //     "status" => 200,
    //     "assignment_id" => $assignment_id,
    //     "user_id" => $user_id,
    //     "user_firstname" => $user_firstname,
    //     "user_lastname" => $user_lastname,
    //     "user_email" => $user_email,
    //     "user_number" => $user_number,
    //     "now" => $now,
    //     "files_string" => $files_string,
    //     "assignment_files" => $assignment_files,
    //     "number_of_files" => $number_of_files,
    //     "price" => $price,
    //     "amount" => $amount
    // );
    // echo json_encode($dummy_array);

    $dummy_array = array(
        "status" => 200,
        "assignment_id" => $assignment_id,
        "user_id" => $user_id,
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
    
    $user_id = "U-".$user_id;

    $order_id = "U-".$assignment_id;
    $order_amount = $amount;
    $order_note = "Plagiarism Check";
    $order_currency = "INR";
    $order_id_for_db = $assignment_id;

    $merchantId = 'BLUEPENONLINE'; // sandbox or test merchantId
    $apiKey = "7572ae3b-936a-43a0-b3a1-653c2ea60c13"; // sandbox or test APIKEY
    $redirectUrl = 'https://bluepen.co.in/api/student/orderpayplag.php?order_id='.$order_id.'&number_of_files='.$number_of_files.'';

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

    $update_order_data_sql = "UPDATE `assignment_plagiarism_check` SET `amount` = '$amount', `phonepe_order_id` = '$payment_session_id', `create_order_result` = '$response' WHERE `id` = '$assignment_id'";
    $update_order_data_result = mysqli_query($conn, $update_order_data_sql);

    echo json_encode(array(
        "status" => 200,
        // "data" => $dummy_array,
        // "response" => $response,
        // "payment_session_id" => $payment_session_id,
        // "sql_result" => $update_order_data_result,
        "link" => $payUrl,
        // "sql" => $update_order_data_sql,
        // "amount" => $amount,
        // "number_of_files" => $number_of_files,
        // "price" => $price,
        // "files_string" => $files_string,
    ));































    
    // $curl = curl_init();

    // curl_setopt_array($curl, [
    //     CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => "{
    //                                 \"customer_details\":
    //                                 {
    //                                     \"customer_id\":\"$user_id\",
    //                                     \"customer_email\":\"$user_email\",
    //                                     \"customer_phone\":\"$user_number\"
    //                                 },
    //                                 \"order_meta\":
    //                                 {
    //                                     \"return_url\":\"https://test.bluepen.co.in/submit/plagiarism-check/checkout/checkorderstatus?order_id={order_id}\"
    //                                 },
    //                                 \"order_id\":\"$order_id\",
    //                                 \"order_amount\":$order_amount,
    //                                 \"order_currency\":\"INR\"
    //                             }",
    //     CURLOPT_HTTPHEADER => [
    //         "accept: application/json",
    //         "content-type: application/json",
    //         "x-api-version: 2022-09-01",
    //         "x-client-id: 5114158e84d301ed7f054ee9f14115",
    //         "x-client-secret: TEST4bf12fc3ea51f7b2ca537411832d3d4b9becc883"
    //     ],
    // ]);

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // $result = json_decode($response, true);
    // $cf_order_id = $result['cf_order_id'];
    // $order_status = $result['order_status'];

    // $update_status_sql = "UPDATE `assignment_plagiarism_check` SET `cf_order_id` = '$cf_order_id', `order_details` = '$order_status', `create_order_result` = '$response' WHERE `assignment_id` = '$assignment_id'";
    // $update_status_result = mysqli_query($conn, $update_status_sql);

    // if ($err)
    // {
    //     // echo "cURL Error #:" . $err;
    //     // header("Location: test.bluepen.co.in/submit/plagiarism-check/checkout/failure");
    //     // exit();
    //     // return;

    //     echo json_encode(array(
    //         "status" => 400,
    //         "data" => $dummy_array,
    //         "response" => $response,
    //         // "payment_session_id" => $payment_session_id,
    //         // "link" => "https://test.bluepen.co.in/api/student/orderpay.php?paymentid=$payment_session_id",
    //     ));
    // }
    // else
    // {   
    //     $payment_session_id = $result['payment_session_id'];
        
    //     // header("Location:  https://test.bluepen.co.in/api/student/orderpay.php?paymentid=$payment_session_id");
    //     // exit();
    //     // return;

    //     echo json_encode(array(
    //         "status" => 200,
    //         "data" => $dummy_array,
    //         "response" => $response,
    //         "payment_session_id" => $payment_session_id,
    //         "link" => "https://test.bluepen.co.in/api/student/orderpay.php?paymentid=$payment_session_id",
    //     ));
    // }

    // // echo json_encode($response);
    
?>