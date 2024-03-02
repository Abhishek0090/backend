<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];

    $map_array = array();

    $get_details_sql = "SELECT * FROM `assignment_plag_check` ORDER BY `id` DESC";
    $get_details_result = mysqli_query($conn, $get_details_sql);
    while($details_map_data = mysqli_fetch_array($get_details_result))
    {
        $id = $details_map_data['id'];
        $submission_date = $details_map_data['submission_date'];
        $name = $details_map_data['name'];
        // $files = $details_map_data['files'];
        $amount = $details_map_data['amount'];
        $status = $details_map_data['status'];
        // $update_time = $details_map_data['update_time'];
        $create_order_result = $details_map_data['create_order_result'];
        $create_order_result = json_decode($create_order_result);
        $code = $create_order_result -> code;

        if($code == "PAYMENT_INITIATED" && $status == "PAYMENT_SUCCESS")
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

        $assignment_array = array(
            "id" => $id,
            "submission_date" => $submission_date,
            "name" => $name,
            "amount" => $amount,
            "status" => $status,
            "code" => $code,
        );
        array_push($map_array, $assignment_array);
    }

    echo json_encode($map_array);

?>