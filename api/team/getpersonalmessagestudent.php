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

    // $get_message_id = "SELECT * FROM `team_and_freelancer_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
    // $get_message_id_query = mysqli_query($conn, $get_message_id);
    // $get_message_id_row = mysqli_fetch_assoc($get_message_id_query);
    // $message_id = $get_message_id_row['id'];
    // $message = $get_message_id_row['message'];

    $get_messages_sql = "SELECT * FROM `team_and_student_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` ASC";
    $get_messages = mysqli_query($conn, $get_messages_sql);
    while ($get_messages_data = mysqli_fetch_array($get_messages))
    {
        $message_id = $get_messages_data['id'];
        $sent_by_type = $get_messages_data['sent_by_type'];
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

        $message_array = array(
            "message_id" => $message_id,
            "sent_by_id" => $sent_by_id,
            "sent_by_name" => $sent_by_name,
            "sent_on" => $sent_on,
            "type" => $type,
            "message" => $message,
            "delivered" => $delivered,
            "read" => $read,
            "deleted" => $deleted
        );
        array_push($messages, $message_array);
    } 

    echo json_encode($messages);

?>