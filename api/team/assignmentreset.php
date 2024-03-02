<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    $assignment_id = $_GET['assignment_id'];

    $assign_reset_sql = "UPDATE `assignment_freelance` SET `posted` = '1' , `under_process` = '0', `assigned_to_pm` = '0', `assigned_to_freelancer` = '0', `completed` = '0' , `review_recieved` = '0' , `lost` = '0', `resit` = '0' WHERE `assignment_id` = '$assignment_id'"; 
    $assign_reset_query = mysqli_query($conn, $assign_reset_sql);

    $affiliate_payment_reset = "UPDATE `affiliate_payments` SET `status` = '0' WHERE `assignment_id` = '$assignment_id'";
    $affiliate_payment_reset_query = mysqli_query($conn, $affiliate_payment_reset);

    if($assign_reset_query)
    {
        $status = 200;
        $message = "Assignment status reset successfully";
    }
    else
    {
        $message = "Error";
    }

    echo json_encode(array(
        'status' => $status,
        'message' => $message 
    ));
?>