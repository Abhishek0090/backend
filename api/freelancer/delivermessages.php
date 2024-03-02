<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $logged_in_freelancer_id = $data['freelancer_id'];
    $freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$logged_in_freelancer_id'";
    $freelancer_details = mysqli_query($conn, $freelancer_details_sql);
    $freelancer_details_row = mysqli_fetch_array($freelancer_details);
    $freelancer_firstname = $freelancer_details_row['firstname'];
    $freelancer_lastname = $freelancer_details_row['lastname'];
    $freelancer_name = $freelancer_firstname . " " . $freelancer_lastname;
    $freelancer_technical = $freelancer_details_row['technical'];
    $freelancer_non_technical = $freelancer_details_row['non technical'];

    if($freelancer_technical == 1)
    {
        $freelancer_role = "Technical";
    }
    else if($freelancer_non_technical == 1)
    {
        $freelancer_role = "Non Technical";
    }

    $freelancer_data = array(
        "freelancer_id" => $logged_in_freelancer_id,
        "freelancer_name" => $freelancer_name,
        "freelancer_role" => $freelancer_role,
    );

    // echo json_encode($freelancer_data);

    
    $my_chats = array();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and Freelancer Personal
    $get_all_chats_team_and_freelancer_personal_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Personal' ORDER BY `id` DESC";
    $get_all_chats_team_and_freelancer_personal = mysqli_query($conn, $get_all_chats_team_and_freelancer_personal_sql);
    while($get_all_chats_team_and_freelancer_personal_row = mysqli_fetch_assoc($get_all_chats_team_and_freelancer_personal))
    {
        $chat_id = $get_all_chats_team_and_freelancer_personal_row['id'];
        $members_present = $get_all_chats_team_and_freelancer_personal_row['members'];
        $members = json_decode($members_present, true);
        $present_freelancer_id = $members['freelancer_id'];

        // check if logged in freelancer is present in given chat, if yes then proceed
        if($present_freelancer_id == $logged_in_freelancer_id)
        {
            // message id 2
            // {"delivered_on":"13-09-2023 11:41:56","delivered_to":3,"delivered_to_type":"Freelancer","delivered_to_name":"bhavya haria","delivered_to_role":"Technical"}
            
            // get all messages of this chat id
            // if given message is not sent by logged in user, check if delivered to him
            // if not delivered then update delivery status

            $get_all_messages_not_sent_by_logged_in_user_sql = "SELECT * FROM `team_and_freelancer_chat` WHERE `chat_id` = '$chat_id' AND `sent_by_type` != 'Freelancer' ORDER BY `id` DESC LIMIT 1";
            $get_all_messages_not_sent_by_logged_in_user = mysqli_query($conn, $get_all_messages_not_sent_by_logged_in_user_sql);
            while($get_all_messages_not_sent_by_logged_in_user_row = mysqli_fetch_assoc($get_all_messages_not_sent_by_logged_in_user))
            {
                $message_id = $get_all_messages_not_sent_by_logged_in_user_row['id'];
                $message_sent_by_type = $get_all_messages_not_sent_by_logged_in_user_row['sent_by_type'];
                $message_sent_by_id = $get_all_messages_not_sent_by_logged_in_user_row['sent_by_id'];
                $message_sent_by_name = $get_all_messages_not_sent_by_logged_in_user_row['sent_by_name'];
                $message_sent_on = $get_all_messages_not_sent_by_logged_in_user_row['sent_on'];
                $message_type = $get_all_messages_not_sent_by_logged_in_user_row['type'];
                $message_message = $get_all_messages_not_sent_by_logged_in_user_row['message'];
                $message_delivered = $get_all_messages_not_sent_by_logged_in_user_row['delivered_on'];
                $message_delivered = json_decode($message_delivered);
                $message_read = $get_all_messages_not_sent_by_logged_in_user_row['read_on'];
                $message_read = json_decode($message_read);
                $message_is_deleted = $get_all_messages_not_sent_by_logged_in_user_row['is_deleted'];
                $message_is_deleted = json_decode($message_is_deleted);

                if($message_delivered == null)
                {
                    $delivered_status = "update to delivered";
                    $delivered_json = array(
                        "delivered_on" => $now,
                        "delivered_to" => $logged_in_freelancer_id,
                        "delivered_to_type" => "Freelancer",
                        "delivered_to_name" => $freelancer_name,
                        "delivered_to_role" => $freelancer_role,
                    );
                    $delivered_json = json_encode($delivered_json);
                    $update_message_data_sql = "UPDATE `team_and_freelancer_chat` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
                    $update_message_data = mysqli_query($conn, $update_message_data_sql);
                    if($update_message_data == true)
                    {
                        $delivered_status = "Message Delivered";
                    }
                }

            }

            $data_object = array(
                "chat_type" => "Team and Freelancer Personal",
                "chat_id" => $chat_id,
                // "get_chat_data_sql" => $get_all_messages_not_sent_by_logged_in_user_sql,
                // "created_on" => $get_all_chats_team_and_freelancer_personal_row['created_on'],
                // "created_by_id" => $get_all_chats_team_and_freelancer_personal_row['created_by_id'],
                // "members" => $members,
            );

            array_push($my_chats, $data_object);
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Team and Freelancer Assignment
    $get_all_chats_team_and_freelancer_assignment_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Assignment' ORDER BY `id` DESC";
    echo json_encode($get_all_chats_team_and_freelancer_assignment_sql);
    $get_all_chats_team_and_freelancer_assignment = mysqli_query($conn, $get_all_chats_team_and_freelancer_assignment_sql);
    while($get_all_chats_team_and_freelancer_assignment_row = mysqli_fetch_assoc($get_all_chats_team_and_freelancer_assignment))
    {
        $chat_id = $get_all_chats_team_and_freelancer_assignment_row['id'];
        $members_present = $get_all_chats_team_and_freelancer_assignment_row['members'];
        $members = json_decode($members_present, true);
        $freelancer_present = $members['freelancers'];

        $chats_array = array();
        foreach($freelancer_present as $freelancer_present)
        {
            if($freelancer_present['id'] == $logged_in_freelancer_id)
            {
                array_push($chats_array, $chat_id);
            }
        }

        $chat_ids_array = array_values(array_unique($chats_array));

        foreach($chat_ids_array as $chat_id)
        {
            // get all messages of this chat id
            // if given message is not sent by logged in user, check if delivered to him
            // if not delivered then update delivery status

            $get_all_messages_not_sent_by_logged_in_user_sql = "SELECT * FROM `team_and_freelancer_chat_assignment` WHERE `chat_id` = '$chat_id' AND `sent_by_type` != 'Freelancer' ORDER BY `id` DESC LIMIT 1";
            $get_all_messages_not_sent_by_logged_in_user = mysqli_query($conn, $get_all_messages_not_sent_by_logged_in_user_sql);
            while($get_all_messages_not_sent_by_logged_in_user_row = mysqli_fetch_assoc($get_all_messages_not_sent_by_logged_in_user))
            {

            }

            $assignment_id = $get_all_chats_team_and_freelancer_assignment_row['assignment_id'];
            $get_assignment_title_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";    
            $get_assignment_title = mysqli_query($conn, $get_assignment_title_sql);
            $get_assignment_title_row = mysqli_fetch_array($get_assignment_title);
            $assignment_title = $get_assignment_title_row['title'];

            $data_object = array(
                "chat_type" => "Team and Freelancer Assignment",
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                // "created_on" => $get_all_chats_team_and_freelancer_assignment_row['created_on'],
                // "created_by_id" => $get_all_chats_team_and_freelancer_assignment_row['created_by_id'],
                // "members" => $members,
            );

            array_push($my_chats, $data_object);
        }
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Assignment Group
    $get_all_chats_assignment_group_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Assignment Group' ORDER BY `id` DESC";
    $get_all_chats_assignment_group = mysqli_query($conn, $get_all_chats_assignment_group_sql);
    while($get_all_chats_assignment_group_row = mysqli_fetch_array($get_all_chats_assignment_group))
    {
        $chat_id = $get_all_chats_assignment_group_row['id'];
        $members_present = $get_all_chats_assignment_group_row['members'];
        $members = json_decode($members_present, true);
        $freelancer_present = $members['freelancers'];

        $chats_array = array();
        foreach($freelancer_present as $freelancer_present)
        {
            if($freelancer_present['id'] == $logged_in_freelancer_id)
            {
                array_push($chats_array, $chat_id);
            }
        }

        $chat_ids_array = array_values(array_unique($chats_array));
        
        foreach($chat_ids_array as $chat_id)
        {
            $get_chat_data_sql = "SELECT * FROM `group_chat_assignment` WHERE `chat_id` = '$chat_id' ORDER BY `id` DESC LIMIT 1";
            $get_chat_data = mysqli_query($conn, $get_chat_data_sql);
            $get_chat_data_row = mysqli_fetch_array($get_chat_data);

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

            $group_assignment_unread_messages = 0;
            $get_all_messages_data_sql = "SELECT * FROM `group_chat_assignment` WHERE `chat_id` = '$chat_id' AND `sent_by_type` != 'Freelancer' ORDER BY `id` DESC";
            $get_all_messages_data = mysqli_query($conn, $get_all_messages_data_sql);
            while($get_all_messages_data_row = mysqli_fetch_assoc($get_all_messages_data))
            {
                $read_on = $get_all_messages_data_row['read_on'];
                $read_on = json_decode($read_on, true);
                if($read_on['read_to'] != $logged_in_freelancer_id)
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
            "created_by_id" => $get_all_chats_assignment_group_row['created_by_id'],
            "members" => $members,
            "unread_messages" => $group_assignment_unread_messages,
            "message_data" => $message_data,
            "enabled_status" => $chat_status,
        );

        // array_push($my_chats, $data_object);
    }
    
    echo json_encode($my_chats);
?>