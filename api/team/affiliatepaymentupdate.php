<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $assignment_id = $_GET['id'];
    
    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $affiliate_id_sql = "SELECT `id` FROM `affiliate_payments` WHERE `assignment_id` = '$assignment_id' and `status` = 1 ORDER BY `id` DESC LIMIT 1";
    $affiliate_id_result = mysqli_query($conn, $affiliate_id_sql);
    $affiliate_id_row = mysqli_fetch_assoc($affiliate_id_result);
    $affiliate_id = $affiliate_id_row['id'];

    $update_affiliate_payment_status_sql = "UPDATE `affiliate_payments` SET `paid_on` = '$now' WHERE `id` = '$affiliate_id'";
    $update_affiliate_payment_status_result = mysqli_query($conn, $update_affiliate_payment_status_sql);

    if($update_affiliate_payment_status_result)
    {
        $status = "success";
        $message = "Affiliate Payment Updated Successfully";
    }
    else
    {
        $status = "error";
        $message = "Affiliate Payment Not Updated";
    }

    echo json_encode(array(
        "status" => $status,
        "message" => $message,
    ));
?>