<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    // $status = $_GET['status'];

    $update_status_sql = "UPDATE `brainheaters` SET `bh_completed` = 1  WHERE `id` = $id";
    $update_status_result = mysqli_query($conn, $update_status_sql);

    if($update_status_result)
    {
        $message = "Status Updated to Completed";
        $status = 200;
    }
    else
    {
        $message = "Error";
    }

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
    ));

?>