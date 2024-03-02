<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];

    $map_array = array();

    $get_details_sql = "SELECT * FROM `assignment_plagiarism_check` ORDER BY `id` DESC";
    $get_details_result = mysqli_query($conn, $get_details_sql);
    while($details_map_data = mysqli_fetch_array($get_details_result))
    {
        $id = $details_map_data['id'];
        // $assignment_id = $details_map_data['assignment_id'];
        $assignment_id = $id;
        $submission_date = $details_map_data['submission_date'];
        $files = $details_map_data['files'];
        $amount = $details_map_data['amount'];
        $status = $details_map_data['status'];
        $update_time = $details_map_data['update_time'];
        $checked_files = $details_map_data['checked_files'];
        $delivery_time = $details_map_data['delivery_time'];
        $checked_by = $details_map_data['checked_by'];

        $create_order_result = $details_map_data['create_order_result'];
        $create_order_result = json_decode($create_order_result);
        $code = $create_order_result -> code;

        if($status == "Submitted")
        {
            $status = "Submitted";
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

        $get_user_id = "SELECT * FROM `assignment_plagiarism_check` WHERE `id` = '$assignment_id'";
        $get_user_id_result = mysqli_query($conn, $get_user_id);
        $get_user_id_data = mysqli_fetch_assoc($get_user_id_result);
        $user_id = $get_user_id_data['user_id'];

        $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $get_user_details_result = mysqli_query($conn, $get_user_details_sql);
        $get_user_details_data = mysqli_fetch_assoc($get_user_details_result);
        $user_name = $get_user_details_data['firstname'] . " " . $get_user_details_data['lastname'];

        $get_team_member_name_sql = "SELECT * FROM  `team` WHERE `id` = '$checked_by'";
        $get_team_member_name_result = mysqli_query($conn, $get_team_member_name_sql);
        $get_team_member_name_data = mysqli_fetch_assoc($get_team_member_name_result);
        $team_name = $get_team_member_name_data['name'];

        $assignment_array = array(
            "id" => $id,
            "assignment_id" => $assignment_id,
            "user_id" => $user_id,
            "user_name" => $user_name,
            "submission_date" => $submission_date,
            "files" => $files,
            "amount" => $amount,
            "status" => $status,
            "update_time" => $update_time,
            "checked_files" => $checked_files,
            "delivery_time" => $delivery_time,
            "checked_by" => $checked_by,
            "team_name" => $team_name
        );
        array_push($map_array, $assignment_array);
    }

    echo json_encode($map_array);

?>