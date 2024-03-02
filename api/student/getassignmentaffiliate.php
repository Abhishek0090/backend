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

    $map_array = array();

    $get_assignment_map_sql = "SELECT * FROM `affiliate_payments` WHERE `affiliate_by_user_id` = '$user_id' AND `status` = 1 ORDER BY `id` DESC";
    $get_assignment_map_result = mysqli_query($conn, $get_assignment_map_sql);
    while($get_assignment_map_row = mysqli_fetch_array($get_assignment_map_result))
    {
        $affiliate_id = $get_assignment_map_row['id'];
        $assignment_id = $get_assignment_map_row['assignment_id'];
        $user_id = $get_assignment_map_row['user_id'];
        $added_on = $get_assignment_map_row['added_on'];
        $amount = $get_assignment_map_row['amount'];
        $paid_on = $get_assignment_map_row['paid_on'];
        $affiliate_by_user_id = $get_assignment_map_row['affiliate_by_user_id'];
        $status = $get_assignment_map_row['status'];

        $affiliate_user_id_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $affiliate_user_id_result = mysqli_query($conn, $affiliate_user_id_sql);
        $affiliate_user_id_row = mysqli_fetch_assoc($affiliate_user_id_result);
        $affiliate_by_user_id_name = $affiliate_user_id_row['firstname'] . " " . $affiliate_user_id_row['lastname'];

        if($paid_on == null)
        {
            $paid_status = "Unpaid";
        }
        else
        {
            $paid_status = "Paid";
        }

        $data_array = array(
            "affiliate_id" => $affiliate_id,
            "assignment_id" => $assignment_id,
            "user_id" => $user_id,
            "added_on" => $added_on,
            "amount" => $amount,
            "paid_on" => $paid_on,
            "paid_status" => $paid_status,
            "affiliate_by_user_id" => $affiliate_by_user_id,
            "affiliate_by_user_id_name" => $affiliate_by_user_id_name,
            "status" => $status
        );
        array_push($map_array, $data_array);
    }
    
    echo json_encode($map_array);

?>