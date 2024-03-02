<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $chat_id = $data['chat_id'];

    $messages = array();

    // $get_message_id = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
    // $get_message_id_query = mysqli_query($conn, $get_message_id);
    // $get_message_id_row = mysqli_fetch_assoc($get_message_id_query);
    // $message_id = $get_message_id_row['id'];
    // $message = $get_message_id_row['message'];

    $get_messages_sql = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` ASC";
    $get_messages = mysqli_query($conn, $get_messages_sql);
    while ($get_messages_data = mysqli_fetch_array($get_messages))
    {
        $message_id = $get_messages_data['id'];
        $sent_by_id = $get_messages_data['sent_by_id'];
        $sent_by_name = $get_messages_data['sent_by_name'];
        $sent_on = $get_messages_data['sent_on'];
        $type = $get_messages_data['type'];
        $message = $get_messages_data['message'];
        $delivered = $get_messages_data['delivered_on'];
        $delivered = json_decode($delivered, true);
        $read = $get_messages_data['read_on'];
        $read = json_decode($read, true);
        $is_deleted = $get_messages_data['is_deleted'];
        $deleted = json_decode($is_deleted, true);
        

        // $chat_enabled_sql = "SELECT * FROM `all_chats` WHERE `chat_id` = '$chat_id'";
        // $chat_enabled_query = mysqli_query($conn, $chat_enabled_sql);
        // $chat_enabled_row = mysqli_fetch_assoc($chat_enabled_query);
        // $chat_enabled = $chat_enabled_row['is_enabled'];

        // $chat_enable_update_data_sql = "SELECT * FROM `chat_enabled_status` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
        // $chat_enable_update_data_query = mysqli_query($conn, $chat_enable_update_data_sql);
        // $chat_enable_update_data_row = mysqli_fetch_assoc($chat_enable_update_data_query);

        // $updated_by_id = $chat_enable_update_data_row['updated_by'];
        // $updated_on = $chat_enable_update_data_row['updated_on'];

        // $team_data_sql = "SELECT * FROM `team` WHERE `id` = '$updated_by_id'";
        // $team_data_query = mysqli_query($conn, $team_data_sql);
        // $team_data_row = mysqli_fetch_assoc($team_data_query);
        // $updated_by_name = $team_data_row['name'];

        // $update_data = array(
        //     "updated_by_id" => $updated_by_id,
        //     "updated_by_name" => $updated_by_name,
        //     "updated_on" => $updated_on,
        // );

        $message_array = array(
            "message_id" => $message_id,
            "sent_by_id" => $sent_by_id,
            "sent_by_name" => $sent_by_name,
            "sent_on" => $sent_on,
            "type" => $type,
            "message" => $message,
            "delivered" => $delivered,
            "read" => $read,
            "deleted" => $deleted,
            // "chat_enabled" => $chat_enabled,
            // "update_data" => $update_data,
        );
        array_push($messages, $message_array);
    } 

    echo json_encode($messages);

?>