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
    $team_id = $data['team_id'];

    $sql_update_chat_status = "UPDATE `all_chats` SET `is_enabled` = 1 WHERE `id` = $chat_id";
    $result_update_chat_status = mysqli_query($conn, $sql_update_chat_status);

    $chat_status_update_data_sql = "INSERT INTO `chat_enabled_status` (`chat_id`, `updated_to`, `updated_by`, `updated_on`)
    VALUES ('$chat_id', '1', '$team_id', '$now')";
    $chat_status_update_data = mysqli_query($conn, $chat_status_update_data_sql);

    if($result_update_chat_status && $chat_status_update_data)
    {
        echo json_encode(array(
            "status" => 200,
            "message" => "Chat disabled successfully",
        ));
        return;
    }
    else
    {
        echo json_encode(array(
            "status" => 500,
            "message" => "Chat disabling failed",
        ));
        return;
    }

?>