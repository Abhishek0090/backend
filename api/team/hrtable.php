<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $logged_in_id = $_GET['logged_in_id'];
    
    $data_array = array();

    $assign_to_hr_table = "SELECT `id`, `name`, `email_old`, `number`, `number_whatsapp`, CASE WHEN `is_active`= 1 THEN 'Active' ELSE 'InActive' END AS status FROM `team` WHERE `role` = 'hr' ORDER BY `id` DESC"; 

    echo json_encode(array(
        'id' => $logged_in_id,
        'sql' => $assign_to_hr_table,
    ));
    $assign_to_hr_table_result = mysqli_query($conn, $assign_to_hr_table); 

    while($assign_to_hr_tabledata = mysqli_fetch_assoc($assign_to_hr_table_result))
    {
    
        $id = $assign_to_hr_tabledata['id'];
        $name = $assign_to_hr_tabledata['name'];
        $email_old = $assign_to_hr_tabledata['email_old'];
        $number = $assign_to_hr_tabledata['number'];
        $number_whatsapp = $assign_to_hr_tabledata['number_whatsapp'];
        $status = $assign_to_hr_tabledata['status'];

        
        $get_team_personal_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team Personal' ORDER BY `id` ASC";
        $get_team_personal_chats_result = mysqli_query($conn, $get_team_personal_chats_sql);
        
        $chats = array();
        while($get_team_personal_chat_data = mysqli_fetch_assoc($get_team_personal_chats_result))
        {
            $chat_id = $get_team_personal_chat_data['id'];
            $members = $get_team_personal_chat_data['members'];
            $members = json_decode($members, true);
            $created_by_id = $members['created_by_id'];
            $member_id = $members['member_id'];
            
            if($members['created_by_id'] == $hr_id && $members['member_id'] == $logged_in_id)
            {
                $chat_status = "Chat exists";
            }
            else if($members['created_by_id'] == $logged_in_id && $members['member_id'] == $hr_id)
            {
                $chat_status = "Chat exists";
            }
            else
            {
                $chat_status = "Chat doesn't exist";
            }

            if($chat_status == "Chat exists")
            {
                $present_chat_id = $chat_id;
                $chat_data = array(
                    "chat_id" => $chat_id,
                    // "members" => $members,
                    "status" => $chat_status,
                    // "present_chat_id" => $present_chat_id,
                    // "hr_id" => $hr_id,
                    // "logged_in_id" => $logged_in_id,
                );
                array_push($chats, $chat_data);
            }
            else
            {
                // $present_chat_id == NULL;
                // $chat_data = array(
                //     "status" => $chat_status,
                // );
                // array_push($chats, $chat_data);
            }            
        }

        $assign_to_hr_array = array(
            'id' => $id,
            'name' => $name,
            'email_old' => $email_old,
            'number' => $number,
            'number_whatsapp' => $number_whatsapp,
            'status' => $status,
            'chats' => $chats,
        );

        array_push($data_array, $assign_to_hr_array);
    }

    echo json_encode($data_array);

?>