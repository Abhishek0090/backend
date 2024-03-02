<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $token = $data['token'];
    $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
    $user_id = $jwt['id'];

    // sql query to select * where user_id = $user_id and assignment domain is plagiarism check ORDER BY id DESC
    // fetch all data of assignment
    // create empty array
    // enter array of 1 assignment in the empty array
    // append the array with assignment details array
    // loop till last assignment
    // return the array

    $map_array = array();

    $get_assignment_map_sql = "SELECT * FROM `assignment_plagiarism_check` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
    $get_assignment_map_result = mysqli_query($conn, $get_assignment_map_sql);

    while($get_assignment_row = mysqli_fetch_assoc($get_assignment_map_result))
    {
        $assignment_id = $get_assignment_row['id'];

        $get_assignment_sql = "SELECT * FROM `assignment_plagiarism_check` WHERE `id` = '$assignment_id'";
        $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
        $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);

        $id = $get_assignment_row['id'];
        $assignment_id = $get_assignment_row['assignment_id'];
        $submission_date = $get_assignment_row['submission_date'];
        $files = $get_assignment_row['checked_files'];
        $amount = $get_assignment_row['amount'];
        $status = $get_assignment_row['status'];
        $order_status = $status;
        $update_time = $get_assignment_row['update_time'];
        $checked_files = $get_assignment_row['checked_files'];
        $delivery_time = $get_assignment_row['delivery_time'];

        $create_order_result = $get_assignment_row['create_order_result'];
        $create_order_result = json_decode($create_order_result);
        $code = $create_order_result -> code;

        if($status == "Submitted")
        {
            $status = "Report Received";
        }
        else if($code == "PAYMENT_INITIATED" && $status == "PAYMENT_SUCCESS")
        {
            $status = "Paid";
        }
        else if($code == "PAYMENT_INITIATED" && $status == "")
        {
            $status = "Pending";
        }
        else if($code == "INVALID_TRANSACTION_ID")
        {
            $status = "Failed";
        }
        else
        {
            $status = "Unknown";
        }
        
        $assignment_details = array(
            'check_assignment_type' => "Plagiarism Check",
            // 'get_assignment_sql' => $get_assignment_sql,
            'order_id' => $id,
            'assignment_id' => $assignment_id, // this is the assignment id from assignment_map table
            'submission_date' => $submission_date,
            'files' => $files,
            'amount' => $amount,
            'status' => $status,
            'update_time' => $update_time,
            'checked_files' => $checked_files,
            'delivery_time' => $delivery_time,
            'create_order_result' => $create_order_result,
            'code' => $code,
            'order_status' => $order_status,
        );
        array_push($map_array, $assignment_details);

    }
    
    echo json_encode($map_array);

?>