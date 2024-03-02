<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    $reason = $_GET['reason'];

    $update_status_sql = "UPDATE `brainheaters` SET `bh_lost` = 0, `lost_reason` = '', `bh_likely` = 0, `bh_converted` = 0, `bh_completed` = 0  WHERE `id` = $id";
    $update_status_result = mysqli_query($conn, $update_status_sql);

    if($update_status_result)
    {
        $message = "Status Reset";
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