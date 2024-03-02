<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $message_id = $data['message_id'];
    $team_id = $data['team_id'];

    $get_team_member_details_sql = "SELECT * FROM `team` WHERE `id` = '$team_id'";
    $get_team_member_details = mysqli_query($conn, $get_team_member_details_sql);
    $get_team_member_details_row = mysqli_fetch_assoc($get_team_member_details);
    $name = $get_team_member_details_row['name'];
    $role = $get_team_member_details_row['role'];

    $message_details_sql = "SELECT * FROM `admin_and_pm_chat_assignment` WHERE `id` = '$message_id'";
    $message_details = mysqli_query($conn, $message_details_sql);
    $message_details_row = mysqli_fetch_assoc($message_details);
    $is_deleted = $message_details_row['is_deleted'];

    if($is_deleted == null)
    {
        $deleted_json = array(
            "deleted_by" => $team_id,
            "deleted_on" => $now,
            "deleted_by_name" => $name,
            "deleted_by_role" => $role,
        );
        $deleted_json = json_encode($deleted_json);

        $update_message_data_sql = "UPDATE `admin_and_pm_chat_assignment` SET `is_deleted` = '$deleted_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message Deleted";
        }
        
    }
    
    echo json_encode(array(
        "status" => $status,
    ));

?>