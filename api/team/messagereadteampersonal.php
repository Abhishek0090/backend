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

    $message_details_sql = "SELECT * FROM `admin_and_pm_chat` WHERE `id` = '$message_id'";
    $message_details = mysqli_query($conn, $message_details_sql);
    $message_details_row = mysqli_fetch_assoc($message_details);
    $read_on = $message_details_row['read_on'];
    

    if($read_on == null)
    {
        $read_json = array(
            "read_on" => $now,
            "read_to" => $team_id,
            "read_to_name" => $name,
            "read_role" => $role,
        );
        $read_json = json_encode($read_json);
        $update_message_data_sql = "UPDATE `admin_and_pm_chat` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message read";
        }
    }
    
    echo json_encode(array(
        "status" => $status,
    ));

?>