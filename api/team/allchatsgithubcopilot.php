<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $team_id = $data['team_id'];

    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team Personal' ORDER BY `id` DESC";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    while($get_all_chats_row = mysqli_fetch_array($get_all_chats))
    {
        $chat_id = $get_all_chats_row['id'];
        $chat_name = $get_all_chats_row['chat_name'];
        $chat_type = $get_all_chats_row['chat_type'];
        $chat_created_by = $get_all_chats_row['chat_created_by'];
        $chat_created_at = $get_all_chats_row['chat_created_at'];
        $chat_updated_at = $get_all_chats_row['chat_updated_at'];

        $get_all_chats_members_sql = "SELECT * FROM `all_chats_members` WHERE `chat_id` = '$chat_id'";
        $get_all_chats_members = mysqli_query($conn, $get_all_chats_members_sql);
        $get_all_chats_members_count = mysqli_num_rows($get_all_chats_members);

        $get_all_chats_messages_sql = "SELECT * FROM `all_chats_messages` WHERE `chat_id` = '$chat_id'";
        $get_all_chats_messages = mysqli_query($conn, $get_all_chats_messages_sql);
        $get_all_chats_messages_count = mysqli_num_rows($get_all_chats_messages);

        $get_all_chats_last_message_sql = "SELECT * FROM `all_chats_messages` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
        $get_all_chats_last_message = mysqli_query($conn, $get_all_chats_last_message_sql);
        $get_all_chats_last_message_row = mysqli_fetch_array($get_all_chats_last_message);
        $get_all_chats_last_message_id = $get_all_chats_last_message_row['id'];
        $get_all_chats_last_message_text = $get_all_chats_last_message_row['message_text'];
        $get_all_chats_last_message_sender = $get_all_chats_last_message_row['message_sender'];
        $get_all_chats_last_message_time = $get_all_chats_last_message_row['message_time'];

        $get_all_chats_last_message_sender_sql = "SELECT * FROM `users` WHERE `id` = '$get_all_chats_last_message_sender'";
        $get_all_chats_last_message_sender = mysqli_query($conn, $get_all_chats_last_message_sender_sql);
        $get_all_chats_last_message_sender_row = mysqli_fetch_array($get_all_chats_last_message_sender);
        $get_all_chats_last_message_sender_name = $get_all_chats_last_message_sender_row['name'];

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));

        $get_all_chats_last_message_time = date("d-m-Y H:i:s", strtotime($get_all_chats_last_message_time));
    }

    
    echo json_encode(array(
        "status" => 200,
        "message" => "Assignment Chat Created",
    ));
?>