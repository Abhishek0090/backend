<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    // echo json_encode($data);

    $created_by_id = $data['created_by_id'];
    $member_id = $data['member_id'];

    if($created_by_id == NULL || $member_id == NULL || $created_by_id == "" || $member_id == "")
    {
        echo json_encode(array(
            "status" => 500,
            "message" => "Please provide all details",
        ));
        return;
    }

    $get_creator_details_sql = "SELECT * FROM `team` WHERE `id` = '$created_by_id'";
    $get_creator_details = mysqli_query($conn, $get_creator_details_sql);
    $get_creator_details_row = mysqli_fetch_assoc($get_creator_details);
    $creator_name = $get_creator_details_row['name'];
    $creator_role = $get_creator_details_row['role'];

    $get_member_details_sql = "SELECT * FROM `team` WHERE `id` = '$member_id'";
    $get_member_details = mysqli_query($conn, $get_member_details_sql);
    $get_member_details_row = mysqli_fetch_assoc($get_member_details);
    $member_name = $get_member_details_row['name'];
    
    $array = array(
        "created_by_id" => $created_by_id,
        "creator_name" => $creator_name,
        "member_id" => $member_id,
        "member_name" => $member_name,
    );

    $members = json_encode($array);

    $insert_into_all_chats_sql = "INSERT INTO `all_chats` (`chat_type`, `created_on`, `created_by_type`, `created_by_id`, `members`, `is_enabled`) 
    VALUES  ('Team Personal', '$now', '$creator_role', '$created_by_id', '$members', 1)";
    $insert_into_all_chats = mysqli_query($conn, $insert_into_all_chats_sql);

    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `created_by_id` = '$created_by_id' AND `members` = '$members' ORDER BY `id` DESC LIMIT 1";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    $get_all_chats_row = mysqli_fetch_assoc($get_all_chats);
    $all_chats_id = $get_all_chats_row['id'];

    echo json_encode(array(
        "status" => 200,
        "message" => "Personal Chat Created",
        "chat_id" => $all_chats_id,
        "members" => json_decode($members),
    ));
?>