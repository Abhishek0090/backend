<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    $reason = $_GET['reason'];

    $update_status_sql = "UPDATE `brainheaters` SET `bh_lost` = 1, `lost_reason` = '$reason', `bh_likely` = -1, `bh_converted` = -1, `bh_completed` = -1  WHERE `id` = $id";
    $update_status_result = mysqli_query($conn, $update_status_sql);

    if($update_status_result)
    {
        $message = "Status Updated to Lost";
        $status = 200;
    }
    else
    {
        $message = "Error";
    }

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // "sql" => $update_status_sql,
    ));

?>