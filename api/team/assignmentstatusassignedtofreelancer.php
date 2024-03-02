<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    // $status = $_GET['status'];

    $update_status_sql = "UPDATE `assignment_freelance` SET `assigned_to_freelancer` = 1  WHERE `assignment_id` = $id";
    $update_status_result = mysqli_query($conn, $update_status_sql);

    $assignment_id_sql = "SELECT * FROM `assignment_map` WHERE `id` = '$id'";
    $assignment_id_query = mysqli_query($conn, $assignment_id_sql);
    $assignment_id_data = mysqli_fetch_assoc($assignment_id_query);
    $user_id = $assignment_id_data['user_id'];

    $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $get_user_details_result = mysqli_query($conn, $get_user_details_sql) or die(mysqli_error($conn));
    $get_user_details_row = mysqli_fetch_assoc($get_user_details_result);
    $user_affiliate_code_by = $get_user_details_row['affiliate_code_by'];
    
    if($user_affiliate_code_by != null)
    {
        // check if assignment poster user id and affiliate code by user id are already present in payments table
        // if no then check assignment type, calculate amount and run query
        // if dissertation then 1500 else 500

        $get_affiliate_payments_data = "SELECT * FROM `affiliate_payments` WHERE `user_id` = '$user_id' AND `affiliate_by_user_id` = '$user_affiliate_code_by' AND `status` = 1";
        $get_affiliate_payments_query = mysqli_query($conn, $get_affiliate_payments_data);
        $get_affiliate_payments_row_number = mysqli_num_rows($get_affiliate_payments_query);
        
        if($get_affiliate_payments_row_number == 0)
        {
            $assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$id'";
            $assignment_data_query = mysqli_query($conn, $assignment_data_sql);
            $assignment_data = mysqli_fetch_assoc($assignment_data_query);
            $assignment_type = $assignment_data['type'];
            $assignment_type = json_decode($assignment_type);

            date_default_timezone_set('Asia/Kolkata');
            $now = date("d-m-Y H:i:s");

            if(in_array("Dissertation Writing", $assignment_type))
            {
                // amount is 1500
                $amount = 1500;
            }
            else
            {
                // amount is 500
                $amount = 500;
            }
            $insert_into_affiliate_payments_sql = "INSERT INTO `affiliate_payments` (`assignment_id`, `user_id`, `added_on`, `amount`, `affiliate_by_user_id`, `status`) VALUES ('$id', '$user_id', '$now', '$amount', '$user_affiliate_code_by', 1)";
            $insert_into_affiliate_payments_query = mysqli_query($conn, $insert_into_affiliate_payments_sql);
        }
        else
        {
            // do nothing
        }
    }

    if($update_status_result)
    {
        $message = "Status Updated to Assigned to Freelancer Successfully";
        $status = 200;
    }
    else
    {
        $message = "Error";
    }

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // 'insert_into_affiliate_payments_sql' => $insert_into_affiliate_payments_sql,
        // 'get_affiliate_payments_data' => $get_affiliate_payments_data,
    ));

?>