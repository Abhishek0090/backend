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
    $team_details_sql = "SELECT * FROM `team` WHERE `id` = $team_id";
    $team_details = mysqli_query($conn, $team_details_sql);
    $team_details_row = mysqli_fetch_assoc($team_details);
    $team_name = $team_details_row['name'];
    $team_role = $team_details_row['role'];

    $my_chats = array();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team Personal
    $get_all_team_personal_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team Personal' ORDER BY `id` DESC";
    $get_all_team_personal_chats = mysqli_query($conn, $get_all_team_personal_chats_sql);
    while($get_all_team_personal_chats_row = mysqli_fetch_array($get_all_team_personal_chats))
    {
        $chat_id = $get_all_team_personal_chats_row['id'];
        $created_by_type = $get_all_team_personal_chats_row['created_by_type'];
        $created_by_id = $get_all_team_personal_chats_row['created_by_id'];
        
        $members = json_decode($get_all_team_personal_chats_row['members'], true);
        $member_id = $members['member_id'];

        if($created_by_id == $team_id || $member_id == $team_id)
        {
            // get all chat data 
            $get_chat_data_sql = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);
                
                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_status = "update to delivered";
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    $delivered_json = json_encode($delivered_json);
                    $update_message_data_sql = "UPDATE `admin_and_pm_chat` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    if($update_message_data == true)
                    {
                        $delivered_status = "Message Delivered";
                    }
                    else
                    {
                        $delivered_status = "Message not delivered";
                    }
                }
                else
                {
                    $delivered_status = "already delivered to ".$team_id. " and sent by ".$message_sent_by_id;
                }
            }
            
            $get_last_message_data_sql = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            // get number of unread messages from chat_id for team_id
            $team_personal_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `admin_and_pm_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $message_sent_by_id = $get_all_messages_data_row['sent_by_id'];
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($message_sent_by_id != $team_id && $read_on['read_to'] != $team_id)
                {
                    $team_personal_unread_messages++;
                }
            }

            $is_enabled = $get_all_team_personal_chats_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }
            
            $data_object = array(
                "chat_type" => "Team Personal",
                "chat_id" => $chat_id,
                "created_on" => $get_all_team_personal_chats_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_team_personal_chats_row['members']),
                "unread_messages" => $team_personal_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );
            array_push($my_chats, $data_object);
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and Freelancer Personal
    $get_all_chats_team_and_freelancer_personal_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Personal' ORDER BY `id` DESC";
    $get_all_chats_team_and_freelancer_personal = mysqli_query($conn, $get_all_chats_team_and_freelancer_personal_sql);
    while($get_all_chats_team_and_freelancer_personal_row = mysqli_fetch_array($get_all_chats_team_and_freelancer_personal))
    {
        $chat_id = $get_all_chats_team_and_freelancer_personal_row['id'];
        $created_by_id = $get_all_chats_team_and_freelancer_personal_row['created_by_id'];
        
        if($team_id == $created_by_id)
        {
            // get all chat data 
            $get_chat_data_sql = "SELECT * FROM `team_and_freelancer_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_type = $get_chat_data_row['sent_by_type'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_type" => $message_sent_by_type,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_status = "update to delivered";
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    $delivered_json = json_encode($delivered_json);
                    $update_message_data_sql = "UPDATE `team_and_freelancer_chat` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    if($update_message_data == true)
                    {
                        $delivered_status = "Message Delivered";
                    }
                }
                else
                {
                    $delivered_status = "already delivered";
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `team_and_freelancer_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            // get number of unread messages from chat_id for team_id
            $team_and_freelancer_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `team_and_freelancer_chat` WHERE `chat_id` = '$chat_id' AND `sent_by_type` = 'Freelancer' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($read_on['read_to'] != $team_id)
                {
                    $team_and_freelancer_unread_messages++;
                }
            }

            $is_enabled = $get_all_chats_team_and_freelancer_personal_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }
            
            $data_object = array(
                "chat_type" => "Team and Freelancer Personal",
                "chat_id" => $chat_id,
                "created_on" => $get_all_chats_team_and_freelancer_personal_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_team_and_freelancer_personal_row['members']),
                "unread_messages" => $team_and_freelancer_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );
            array_push($my_chats, $data_object);
            
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and User Personal
    $get_all_chats_team_and_user_personal_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and User Personal' ORDER BY `id` DESC";
    $get_all_chats_team_and_user_personal = mysqli_query($conn, $get_all_chats_team_and_user_personal_sql);
    while($get_all_chats_team_and_user_personal_row = mysqli_fetch_array($get_all_chats_team_and_user_personal))
    {
        $chat_id = $get_all_chats_team_and_user_personal_row['id'];
        $created_by_id = $get_all_chats_team_and_user_personal_row['created_by_id'];

        if($team_id == $created_by_id)
        {
            $get_chat_data_sql = "SELECT * FROM `team_and_student_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {

                $message_id = $get_chat_data_row['id'];
                $message_sent_by_type = $get_chat_data_row['sent_by_type'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_type" => $message_sent_by_type,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_status = "update to delivered";
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    $delivered_json = json_encode($delivered_json);
                    $update_message_data_sql = "UPDATE `team_and_student_chat` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    if($update_message_data == true)
                    {
                        $delivered_status = "Message Delivered";
                    }
                }
                else
                {
                    $delivered_status = "already delivered";
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `team_and_student_chat` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );            
            
            $team_and_student_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `team_and_student_chat` WHERE `chat_id` = '$chat_id' AND `sent_by_type` = 'Student' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($read_on['read_to'] != $team_id)
                {
                    $team_and_student_unread_messages++;
                }
            }

            $is_enabled = $get_all_chats_team_and_user_personal_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }

            $data_object = array(
                "chat_type" => "Team and Student Personal",
                "chat_id" => $chat_id,
                "created_on" => $get_all_chats_team_and_user_personal_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_team_and_user_personal_row['members']),
                "unread_messages" => $team_and_student_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );

            array_push($my_chats, $data_object);
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team Assignment
    $get_all_chats_team_assignment_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team Assignment' ORDER BY `id` DESC";
    $get_all_chats_team_assignment = mysqli_query($conn, $get_all_chats_team_assignment_sql);
    while($get_all_chats_team_assignment_row = mysqli_fetch_array($get_all_chats_team_assignment))
    {
        $chat_id = $get_all_chats_team_assignment_row['id'];
        $created_by_id = $get_all_chats_team_assignment_row['created_by_id'];
        $members = json_decode($get_all_chats_team_assignment_row['members'], true);
        $chats_array = array();
        foreach($members['team'] as $member)
        {
            $member_id = $member['id'];
            if($created_by_id == $team_id || $member_id == $team_id)
            {
                $status = "Present in chat_id: ".$chat_id;
                array_push($chats_array, $chat_id);
            }
        }
        
        $chat_ids_array = array_values(array_unique($chats_array));
        
        foreach($chat_ids_array as $chat_id)
        {
            $get_chat_data_sql = "SELECT * FROM `admin_and_pm_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_data = array();
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    array_push($delivered_data, $delivered_json);
                    $delivered_json = json_encode($delivered_data);

                    $update_message_data_sql = "UPDATE `admin_and_pm_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    if($update_message_data == true)
                    {
                        $delivered_status = "Message Delivered";
                    }
                }
                else
                {
                    $delivered_to_array = array();
                    foreach($message_delivered as $delivered)
                    {
                        array_push ($delivered_to_array, $delivered->delivered_to);
                    }
                    $index_array = array_values(array_unique($delivered_to_array));
                    if(!in_array($team_id, $index_array))
                    {
                        $delivered_data = $message_delivered;
                        $delivered_json = array(
                            "delivered_on" => $now,
                            "delivered_to" => $team_id,
                            "delivered_to_name" => $team_name,
                            "delivered_to_role" => $team_role,
                        );
                        array_push($delivered_data, $delivered_json);
                        $delivered_json = json_encode($delivered_data);
                        $update_message_data_sql = "UPDATE `admin_and_pm_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                        $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    }
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `admin_and_pm_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            $team_assignment_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `admin_and_pm_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $message_sent_by_id = $get_all_messages_data_row['sent_by_id'];
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($message_sent_by_id != $team_id) //&& $read_on['read_to'] != $team_id
                {
                    $read_to_ids = array();
                    foreach($read_on as $read_data)
                    {
                        array_push($read_to_ids, $read_data['read_to']);
                    }
                    $index_array = array_values(array_unique($read_to_ids));
                    if(!in_array($team_id, $index_array))
                    {
                        $team_assignment_unread_messages++;
                    }
                }
            }

            $assignment_id = $get_all_chats_team_assignment_row['assignment_id'];
            $get_assignment_title_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_title = mysqli_query($conn, $get_assignment_title_sql);
            $get_assignment_title_row = mysqli_fetch_array($get_assignment_title);
            $assignment_title = $get_assignment_title_row['title'];

            $is_enabled = $get_all_chats_team_assignment_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }

            $data_object = array(
                "chat_type" => "Team Assignment",
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                "created_on" => $get_all_chats_team_assignment_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_team_assignment_row['members']),
                "unread_messages" => $team_assignment_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );

            if(!empty($chat_ids_array))
            {
                array_push($my_chats, $data_object);
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and Freelancer Assignment
    $get_all_chats_team_and_freelancer_assignment_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Assignment' ORDER BY `id` DESC";
    $get_all_chats_team_and_freelancer_assignment = mysqli_query($conn, $get_all_chats_team_and_freelancer_assignment_sql);
    while($get_all_chats_team_and_freelancer_assignment_row = mysqli_fetch_array($get_all_chats_team_and_freelancer_assignment))
    {
        $chat_id = $get_all_chats_team_and_freelancer_assignment_row['id'];
        $created_by_id = $get_all_chats_team_and_freelancer_assignment_row['created_by_id'];
        $members = json_decode($get_all_chats_team_and_freelancer_assignment_row['members'], true);
        $chats_array = array();
        foreach($members['team'] as $member)
        {
            $member_id = $member['id'];
            if($created_by_id == $team_id || $member_id == $team_id)
            {
                $status = "Present in chat_id: ".$chat_id;
                array_push($chats_array, $chat_id);
            }
        }
        
        $chat_ids_array = array_values(array_unique($chats_array));
        
        foreach($chat_ids_array as $chat_id)
        {
            $get_chat_data_sql = "SELECT * FROM `team_and_freelancer_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_type = $get_chat_data_row['sent_by_type'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_type" => $message_sent_by_type,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_data = array();
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    array_push($delivered_data, $delivered_json);
                    $delivered_json = json_encode($delivered_data);

                    $update_message_data_sql = "UPDATE `team_and_freelancer_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                }
                else
                {
                    $delivered_to_array = array();
                    foreach($message_delivered as $delivered)
                    {
                        array_push ($delivered_to_array, $delivered->delivered_to);
                    }
                    $index_array = array_values(array_unique($delivered_to_array));
                    if(!in_array($team_id, $index_array))
                    {
                        $delivered_data = $message_delivered;
                        $delivered_json = array(
                            "delivered_on" => $now,
                            "delivered_to" => $team_id,
                            "delivered_to_name" => $team_name,
                            "delivered_to_role" => $team_role,
                        );
                        array_push($delivered_data, $delivered_json);
                        $delivered_json = json_encode($delivered_data);
                        
                        $update_message_data_sql = "UPDATE `team_and_freelancer_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                        $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    }
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `team_and_freelancer_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            $team_and_freelancer_assignment_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `team_and_freelancer_chat_assignment` WHERE `chat_id` = '$chat_id' AND `sent_by_type` = 'Freelancer' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $message_sent_by_id = $get_all_messages_data_row['sent_by_id'];
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($message_sent_by_id != $team_id) //$read_on['read_to'] != $team_id
                {
                    $read_to_ids = array();
                    foreach($read_on as $read_data)
                    {
                        array_push($read_to_ids, $read_data['read_to']);
                    }
                    $index_array = array_values(array_unique($read_to_ids));
                    if(!in_array($team_id, $index_array))
                    {
                        $team_and_freelancer_assignment_unread_messages++;
                    }
                }
            }

            $assignment_id = $get_all_chats_team_and_freelancer_assignment_row['assignment_id'];
            $get_assignment_title_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_title = mysqli_query($conn, $get_assignment_title_sql);
            $get_assignment_title_row = mysqli_fetch_array($get_assignment_title);
            $assignment_title = $get_assignment_title_row['title'];

            $is_enabled = $get_all_chats_team_and_freelancer_assignment_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }

            $data_object = array(
                "chat_type" => "Team and Freelancer Assignment",
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                "created_on" => $get_all_chats_team_and_freelancer_assignment_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_team_and_freelancer_assignment_row['members']),
                "unread_messages" => $team_and_freelancer_assignment_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );

            if(!empty($chat_ids_array))
            {
                array_push($my_chats, $data_object);
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and User Assignment
    $get_all_chats_team_and_user_assignment_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Student Assignment' ORDER BY `id` DESC";
    $get_all_chats_team_and_user_assignment = mysqli_query($conn, $get_all_chats_team_and_user_assignment_sql);
    while($get_all_chats_team_and_user_assignment_row = mysqli_fetch_assoc($get_all_chats_team_and_user_assignment))
    {
        $chat_id = $get_all_chats_team_and_user_assignment_row['id'];
        $created_by_id = $get_all_chats_team_and_user_assignment_row['created_by_id'];
        $members = json_decode($get_all_chats_team_and_user_assignment_row['members'], true);
        $chats_array = array();
        foreach($members['team'] as $member)
        {
            $member_id = $member['id'];
            if($created_by_id == $team_id || $member_id == $team_id)
            {
                $status = "Present in chat_id: ".$chat_id;
                array_push($chats_array, $chat_id);
            }
        }

        $chat_ids_array = array_values(array_unique($chats_array));

        foreach($chat_ids_array as $chat_id)
        {
            $get_chat_data_sql = "SELECT * FROM `team_and_student_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_type = $get_chat_data_row['sent_by_type'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_type" => $message_sent_by_type,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null && $message_sent_by_id != $team_id)
                {
                    $delivered_data = array();
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    array_push($delivered_data, $delivered_json);
                    $delivered_json = json_encode($delivered_data);

                    $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                }
                else
                {
                    $delivered_to_array = array();
                    foreach($message_delivered as $delivered)
                    {
                        array_push ($delivered_to_array, $delivered->delivered_to);
                    }
                    $index_array = array_values(array_unique($delivered_to_array));
                    if(!in_array($team_id, $index_array))
                    {
                        $delivered_data = $message_delivered;
                        $delivered_json = array(
                            "delivered_on" => $now,
                            "delivered_to" => $team_id,
                            "delivered_to_name" => $team_name,
                            "delivered_to_role" => $team_role,
                        );
                        array_push($delivered_data, $delivered_json);
                        $delivered_json = json_encode($delivered_data);

                        $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                        $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    }
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `team_and_student_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            $team_and_student_assignment_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `team_and_student_chat_assignment` WHERE `chat_id` = '$chat_id' AND `sent_by_type` = 'Student' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_assoc($get_all_messages_data))
            {
                $message_sent_by_id = $get_all_messages_data_row['sent_by_id'];
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($message_sent_by_id != $team_id) //$read_on['read_to'] != $team_id
                {
                    $read_to_ids = array();
                    foreach($read_on as $read_data)
                    {
                        array_push($read_to_ids, $read_data['read_to']);
                    }
                    $index_array = array_values(array_unique($read_to_ids));
                    if(!in_array($team_id, $index_array))
                    {
                        $team_and_student_assignment_unread_messages++;
                    }
                }
            }

            $assignment_id = $get_all_chats_team_and_user_assignment_row['assignment_id'];
            $get_assignment_title_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_title = mysqli_query($conn, $get_assignment_title_sql);
            $get_assignment_title_row = mysqli_fetch_array($get_assignment_title);
            $assignment_title = $get_assignment_title_row['title'];

            $is_enabled = $get_all_chats_team_and_user_assignment_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }

            $data_object = array(
                "chat_type" => "Team and Student Assignment",
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                "created_on" => $get_all_chats_team_and_user_assignment_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_team_and_user_assignment_row['members']),
                "unread_messages" => $team_and_student_assignment_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );

            if(!empty($chat_ids_array))
            {
                array_push($my_chats, $data_object);
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Assignment Group
    $get_all_chats_assignment_group_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Assignment Group' ORDER BY `id` DESC";
    $get_all_chats_assignment_group = mysqli_query($conn, $get_all_chats_assignment_group_sql);
    while($get_all_chats_assignment_group_row = mysqli_fetch_array($get_all_chats_assignment_group))
    {
        $chat_id = $get_all_chats_assignment_group_row['id'];
        $created_by_id = $get_all_chats_assignment_group_row['created_by_id'];
        $members = json_decode($get_all_chats_assignment_group_row['members'], true);
        $chats_array = array();
        foreach($members['team'] as $member)
        {
            $member_id = $member['id'];
            if($created_by_id == $team_id || $member_id == $team_id)
            {
                $status = "Present in chat_id: ".$chat_id;
                array_push($chats_array, $chat_id);
            }
        }
        
        $chat_ids_array = array_values(array_unique($chats_array));

        foreach($chat_ids_array as $chat_id)
        {
            $get_chat_data_sql = "SELECT * FROM `group_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            while($get_chat_data_row = mysqli_fetch_array($get_chat_data))
            {
                $message_id = $get_chat_data_row['id'];
                $message_sent_by_type = $get_chat_data_row['sent_by_type'];
                $message_sent_by_id = $get_chat_data_row['sent_by_id'];
                $message_sent_by_name = $get_chat_data_row['sent_by_name'];
                $message_sent_on = $get_chat_data_row['sent_on'];
                $message_type = $get_chat_data_row['type'];
                $message_message = $get_chat_data_row['message'];
                $message_delivered = $get_chat_data_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_chat_data_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_chat_data_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                $message_data = array(
                    "message_id" => $message_id,
                    "sent_by_type" => $message_sent_by_type,
                    "sent_by_id" => $message_sent_by_id,
                    "sent_by_name" => $message_sent_by_name,
                    "sent_on" => $message_sent_on,
                    "type" => $message_type,
                    "message" => $message_message,
                    "delivered" => $message_delivered,
                    "read" => $message_read,
                    "deleted" => $message_is_deleted,
                );

                if($message_delivered == null)
                {
                    $delivered_data = array();
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $team_id,
                        "delivered_to_name" => $team_name,
                        "delivered_to_role" => $team_role,
                    );
                    array_push($delivered_data, $delivered_json);
                    $delivered_json = json_encode($delivered_data);

                    $update_message_data_sql = "UPDATE `group_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                }
                else
                {
                    $delivered_to_array = array();
                    foreach($message_delivered as $delivered)
                    {
                        array_push ($delivered_to_array, $delivered->delivered_to);
                    }
                    $index_array = array_values(array_unique($delivered_to_array));
                    if(!in_array($team_id, $index_array))
                    {
                        $delivered_data = $message_delivered;
                        $delivered_json = array(
                            "delivered_on" => $now,
                            "delivered_to" => $team_id,
                            "delivered_to_name" => $team_name,
                            "delivered_to_role" => $team_role,
                        );
                        array_push($delivered_data, $delivered_json);
                        $delivered_json = json_encode($delivered_data);

                        $update_message_data_sql = "UPDATE `group_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                        $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    }
                }
            }

            $get_last_message_data_sql = "SELECT * FROM `group_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_last_message_data = mysqli_query($conn, $get_last_message_data_sql);
            $get_last_message_data_row = mysqli_fetch_array($get_last_message_data);

            $message_id = $get_last_message_data_row['id'];
            $message_sent_by_type = $get_last_message_data_row['sent_by_type'];
            $message_sent_by_id = $get_last_message_data_row['sent_by_id'];
            $message_sent_by_name = $get_last_message_data_row['sent_by_name'];
            $message_sent_on = $get_last_message_data_row['sent_on'];
            $message_type = $get_last_message_data_row['type'];
            $message_message = $get_last_message_data_row['message'];
            $message_delivered = $get_last_message_data_row['delivered_on'];
            $message_delivered = json_decode($message_delivered);
            $message_read = $get_last_message_data_row['read_on'];
            $message_read = json_decode($message_read);
            $message_is_deleted = $get_last_message_data_row['is_deleted'];
            $message_is_deleted = json_decode($message_is_deleted);

            $message_data = array(
                "message_id" => $message_id,
                "sent_by_type" => $message_sent_by_type,
                "sent_by_id" => $message_sent_by_id,
                "sent_by_name" => $message_sent_by_name,
                "sent_on" => $message_sent_on,
                "type" => $message_type,
                "message" => $message_message,
                "delivered" => $message_delivered,
                "read" => $message_read,
                "deleted" => $message_is_deleted,
            );
            
            $group_assignment_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `group_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_array($get_all_messages_data))
            {
                $message_sent_by_id = $get_all_messages_data_row['sent_by_id'];
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($message_sent_by_id != $team_id) //$read_on['read_to'] != $team_id
                {
                    $read_to_ids = array();
                    foreach($read_on as $read_data)
                    {
                        array_push($read_to_ids, $read_data['read_to']);
                    }
                    $index_array = array_values(array_unique($read_to_ids));
                    if(!in_array($team_id, $index_array))
                    {
                        $group_assignment_unread_messages++;
                    }
                }
            }

            $assignment_id = $get_all_chats_assignment_group_row['assignment_id'];
            $get_assignment_title_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_title = mysqli_query($conn, $get_assignment_title_sql);
            $get_assignment_title_row = mysqli_fetch_array($get_assignment_title);
            $assignment_title = $get_assignment_title_row['title'];

            $is_enabled = $get_all_chats_assignment_group_row['is_enabled'];
            if($is_enabled == 0)
            {
                $chat_status = "Disabled";
            }
            else
            {
                $chat_status = "Enabled";
            }

            $data_object = array(
                "chat_type" => "Assignment Group",
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                "created_on" => $get_all_chats_assignment_group_row['created_on'],
                "created_by_id" => $created_by_id,
                "members" => json_decode($get_all_chats_assignment_group_row['members']),
                "unread_messages" => $group_assignment_unread_messages,
                "message_data" => $message_data,
                "enabled_status" => $chat_status,
            );

            if(!empty($chat_ids_array))
            {
                array_push($my_chats, $data_object);
            }
        }
    }

    echo json_encode($my_chats);
?>