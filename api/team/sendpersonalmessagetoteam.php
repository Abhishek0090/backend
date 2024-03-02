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
    $sent_by_id = $data['sent_by_id'];
    $type = $data['type'];
    $message = $data['message'];
    $message = str_replace("'", "\'", $message);

    $get_sender_name_sql = "SELECT * FROM `team` WHERE `id` = '$sent_by_id'";
    $get_sender_name = mysqli_query($conn, $get_sender_name_sql);
    $get_sender_name_row = mysqli_fetch_assoc($get_sender_name);
    $sender_name = $get_sender_name_row['name'];

    if($type == "Text Message")
    {
        $insert_message_sql = "INSERT INTO `admin_and_pm_chat` 
        (`chat_id`, `sent_by_id`, `sent_by_name`, `sent_on`, `type`, `message`)
        VALUES ('$chat_id', '$sent_by_id', '$sender_name', '$now', '$type', '$message')";
        $insert_message = mysqli_query($conn, $insert_message_sql);

        $get_message_id = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' AND `sent_by_id` = '$sent_by_id' AND `type` = '$type' AND `message` = '$message' ORDER BY `id` DESC LIMIT 1";
        $get_message_id_query = mysqli_query($conn, $get_message_id);
        $get_message_id_row = mysqli_fetch_assoc($get_message_id_query);
        $message_id = $get_message_id_row['id'];

        echo json_encode(array(
            "status" => 200,
            "message" => "Message Sent",
            "message_id" => $message_id,
        ));
    }

    else if($type == "File")
    {
        $insert_message_sql = "INSERT INTO `admin_and_pm_chat` 
        (`chat_id`, `sent_by_id`, `sent_by_name`, `sent_on`, `type`, `message`)
        VALUES ('$chat_id', '$sent_by_id', '$sender_name', '$now', '$type', '$message')";
        $insert_message = mysqli_query($conn, $insert_message_sql);

        $get_message_id = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' AND `sent_by_id` = '$sent_by_id' AND `type` = '$type' AND `message` = '$message' ORDER BY `id` DESC LIMIT 1";
        $get_message_id_query = mysqli_query($conn, $get_message_id);
        $get_message_id_row = mysqli_fetch_assoc($get_message_id_query);
        $message_id = $get_message_id_row['id'];

        $u_id = "C-".$chat_id. " M-".$message_id; 

        $files = explode('_$_', $message);
        $number_of_files = count($files);

        if($number_of_files == 2)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);
            }
            elseif($number_of_files == 3)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);
            }
            elseif($number_of_files == 4)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);
            }
            elseif($number_of_files == 5)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);
            }
            elseif($number_of_files == 6)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);
            }
            elseif($number_of_files == 7)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);

                rename("../../files/uploads/chat/team_personal/".$files[5], "../../files/chat/team_personal/".$u_id."_".$files[5]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[5], "chat/team_personal/".$u_id."_".$files[5]);
            }
            elseif($number_of_files == 8)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);

                rename("../../files/uploads/chat/team_personal/".$files[5], "../../files/chat/team_personal/".$u_id."_".$files[5]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[5], "chat/team_personal/".$u_id."_".$files[5]);

                rename("../../files/uploads/chat/team_personal/".$files[6], "../../files/chat/team_personal/".$u_id."_".$files[6]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[6], "chat/team_personal/".$u_id."_".$files[6]);
            }
            elseif($number_of_files == 9)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);

                rename("../../files/uploads/chat/team_personal/".$files[5], "../../files/chat/team_personal/".$u_id."_".$files[5]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[5], "chat/team_personal/".$u_id."_".$files[5]);

                rename("../../files/uploads/chat/team_personal/".$files[6], "../../files/chat/team_personal/".$u_id."_".$files[6]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[6], "chat/team_personal/".$u_id."_".$files[6]);

                rename("../../files/uploads/chat/team_personal/".$files[7], "../../files/chat/team_personal/".$u_id."_".$files[7]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[7], "chat/team_personal/".$u_id."_".$files[7]);
            }
            elseif($number_of_files == 10)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);

                rename("../../files/uploads/chat/team_personal/".$files[5], "../../files/chat/team_personal/".$u_id."_".$files[5]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[5], "chat/team_personal/".$u_id."_".$files[5]);

                rename("../../files/uploads/chat/team_personal/".$files[6], "../../files/chat/team_personal/".$u_id."_".$files[6]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[6], "chat/team_personal/".$u_id."_".$files[6]);

                rename("../../files/uploads/chat/team_personal/".$files[7], "../../files/chat/team_personal/".$u_id."_".$files[7]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[7], "chat/team_personal/".$u_id."_".$files[7]);

                rename("../../files/uploads/chat/team_personal/".$files[8], "../../files/chat/team_personal/".$u_id."_".$files[8]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[8], "chat/team_personal/".$u_id."_".$files[8]);
            }
            elseif($number_of_files == 11)
            {
                rename("../../files/uploads/chat/team_personal/".$files[0], "../../files/chat/team_personal/".$u_id."_".$files[0]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[0], "chat/team_personal/".$u_id."_".$files[0]);

                rename("../../files/uploads/chat/team_personal/".$files[1], "../../files/chat/team_personal/".$u_id."_".$files[1]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[1], "chat/team_personal/".$u_id."_".$files[1]);

                rename("../../files/uploads/chat/team_personal/".$files[2], "../../files/chat/team_personal/".$u_id."_".$files[2]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[2], "chat/team_personal/".$u_id."_".$files[2]);

                rename("../../files/uploads/chat/team_personal/".$files[3], "../../files/chat/team_personal/".$u_id."_".$files[3]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[3], "chat/team_personal/".$u_id."_".$files[3]);

                rename("../../files/uploads/chat/team_personal/".$files[4], "../../files/chat/team_personal/".$u_id."_".$files[4]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[4], "chat/team_personal/".$u_id."_".$files[4]);

                rename("../../files/uploads/chat/team_personal/".$files[5], "../../files/chat/team_personal/".$u_id."_".$files[5]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[5], "chat/team_personal/".$u_id."_".$files[5]);

                rename("../../files/uploads/chat/team_personal/".$files[6], "../../files/chat/team_personal/".$u_id."_".$files[6]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[6], "chat/team_personal/".$u_id."_".$files[6]);

                rename("../../files/uploads/chat/team_personal/".$files[7], "../../files/chat/team_personal/".$u_id."_".$files[7]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[7], "chat/team_personal/".$u_id."_".$files[7]);

                rename("../../files/uploads/chat/team_personal/".$files[8], "../../files/chat/team_personal/".$u_id."_".$files[8]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[8], "chat/team_personal/".$u_id."_".$files[8]);

                rename("../../files/uploads/chat/team_personal/".$files[9], "../../files/chat/team_personal/".$u_id."_".$files[9]);
                copy("../../files/chat/team_personal/".$u_id."_".$files[9], "chat/team_personal/".$u_id."_".$files[9]);
            }

            echo json_encode(array(
                "status" => 200,
                "message" => "Message Sent",
                "message_id" => $message_id,
            ));
    }
?>