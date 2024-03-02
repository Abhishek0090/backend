<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $pm_id = $_GET['pm_id'];
    $logged_in_id = $_GET['logged_in_id'];
    
    $data_array = array();
    $details_array = array();

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_marks_out_of_100 = 0;
    $total_marks_category = "";

    $pm_details_sql = "SELECT * FROM `team` WHERE id = $pm_id";

    $pm_details_result = mysqli_query($conn, $pm_details_sql); 
    while($pm_details_data = mysqli_fetch_assoc($pm_details_result))
    {
        $id = $pm_details_data['id'];
        $name = $pm_details_data['name'];
        $email_old = $pm_details_data['email_old'];
        $number = $pm_details_data['number'];
        $number_whatsapp = $pm_details_data['number_whatsapp'];
        $city = $pm_details_data['city'];
        $role = $pm_details_data['role'];
        $is_technical = $pm_details_data['is_technical'];
        $is_non_technical = $pm_details_data['is_non_technical'];
        $status = $pm_details_data['status'];

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
            
            if($members['created_by_id'] == $pm_id && $members['member_id'] == $logged_in_id)
            {
                $chat_status = "Chat exists";
            }
            else if($members['created_by_id'] == $logged_in_id && $members['member_id'] == $pm_id)
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
                    "status" => $chat_status,
                );
                array_push($chats, $chat_data);
            }            
        }

        $total_inquiry_count_sql =  "SELECT count(*) FROM `assignment_freelance` WHERE `project_manager` = '$pm_id'   " ;
        $total_inquiry_count_result = mysqli_query($conn, $total_inquiry_count_sql); 
        $total_inquiry_count_row = mysqli_fetch_assoc($total_inquiry_count_result);
        $total_inquiry_count = $total_inquiry_count_row['count(*)'];

        $completed_sql =  "SELECT count(*) FROM `assignment_freelance` WHERE `project_manager` = '$pm_id' AND  `completed` = '1' " ;
        $completed_Query = mysqli_query($conn, $completed_sql); 
        $completed_sql_result = mysqli_fetch_assoc($completed_Query);
        $completed_count = $completed_sql_result['count(*)'];

        $pm_details_array = array(
            'heading' => 'Personal Details',
            'id' => $id,
            'name' => $name,
            'email_old' => $email_old,
            'number' => $number,
            'number_whatsapp' => $number_whatsapp,
            'city' => $city,
            'role' => $role,
            'chat' => $chats,
            'is_technical' => $is_technical,
            'is_non_technical' => $is_non_technical ,
            'status' => $status ,
            'totalinquirycount' =>  $total_inquiry_count,
            'completed' => $completed_count
        );
        array_push($data_array, $pm_details_array);
    }

    $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `project_manager` = '$pm_id' ORDER BY `id` DESC  ";
    $pm_details_tbl_result = mysqli_query($conn, $assignment_details_sql); 
    while($pm_details_data = mysqli_fetch_assoc($pm_details_tbl_result))
    {
        $id = $pm_details_data['assignment_id'];
        $stream = $pm_details_data['stream'];
        $title = $pm_details_data['title'];
        $description = $pm_details_data['description'];
        $deadline = $pm_details_data['deadline'];
        $budget = $pm_details_data['budget']; 
        $posted = $pm_details_data['posted'];
        $under_process = $pm_details_data['under_process'];
        $assigned_to_pm = $pm_details_data['assigned_to_pm'];
        $assigned_to_freelancer = $pm_details_data['assigned_to_freelancer'];
        $completed = $pm_details_data['completed'];
        $review_recieved = $pm_details_data['review_recieved'];
        $lost = $pm_details_data['lost'];
        $resit = $pm_details_data['resit'];
        $marks_obtained = $pm_details_data['marks_obtained'];
        $marks_out_of = $pm_details_data['marks_out_of'];
        $feedback = $pm_details_data['feedback'];
        $marks_added_on = $pm_details_data['marks_added_on'];

        if($stream == "Engineering")
        {
            $domain = "Technical";
        }
        else
        {
            $domain = "Non-Technical";
        }

        if($resit == '1')
        {
            $assignment_status= "Resit";
        }
        else if($lost == '1')
        {
            $assignment_status= "Lost";
        }
        else if($review_recieved == '1')
        {
            $assignment_status= "Review Received";
        }
        else if($completed == '1')
        {
            $assignment_status= "Completed";
        }
        else if($assigned_to_freelancer == '1')
        {
            $assignment_status= "Assigned to Freelancer";
        }
        else if($assigned_to_pm == '1')
        {
            $assignment_status= "Assigned to PM";
        }
        else if($under_process == '1')
        {
            $assignment_status= "Under Process";
        }

        $map_details_sql = "SELECT * FROM `assignment_map` WHERE `id` = '$id' ORDER BY `id` DESC";
        $map_details_result = mysqli_query($conn, $map_details_sql);
        $map_details_data = mysqli_fetch_assoc($map_details_result);

        $user_id = $map_details_data['user_id'];

        $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id' ORDER BY `id` DESC";
        $get_user_details_result = mysqli_query($conn, $get_user_details_sql);
        $get_user_details_data = mysqli_fetch_assoc($get_user_details_result);
        $user_name = $get_user_details_data['firstname'] . " " . $get_user_details_data['lastname'];

        $is_select = $get_user_details_data['is_select'];

        $assignment_id = $map_details_data['id'];
        
        $freelancers_array = array();

        $get_assigned_freelancers_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = '$assignment_id' AND `status` = 1 ORDER BY id DESC";
        $get_assigned_freelancers_result = mysqli_query($conn, $get_assigned_freelancers_sql);
        while($get_assigned_freelancers_data = mysqli_fetch_array($get_assigned_freelancers_result))
        {
            $freelancer_id = $get_assigned_freelancers_data['freelancer_id'];
            $freelancer_array = array(
                'id' => $freelancer_id,
            );
            array_push($freelancers_array, $freelancer_id);
        }


        if($marks_out_of == null)
        {
            $marks_category = "Marks not Received";
        }
        else
        {
            if($marks_out_of != 100)
            {
                // convert to 100
                $out_of_100 = $marks_obtained * 100 / $marks_out_of;
                
                switch($out_of_100)
                {
                    case ($out_of_100 >= 71):
                        $marks_category = "Distinction";
                        break;
                    case ($out_of_100 >= 61 && $out_of_100 <= 70):
                        $marks_category = "Merit";
                        break;
                    case ($out_of_100 >= 51 && $out_of_100 <= 60):
                        $marks_category = "Passing";
                        break;
                    case ($out_of_100 >= 0 && $out_of_100 <= 50):
                        $marks_category = "Resit";
                        break;
                }
            }
            if($marks_out_of == 100)
            {
                switch($marks_obtained)
                {
                    case ($marks_obtained >= 71):
                        $marks_category = "Distinction";
                        break;
                    case ($marks_obtained >= 61 && $marks_obtained <= 70):
                        $marks_category = "Merit";
                        break;
                    case ($marks_obtained >= 51 && $marks_obtained <= 60):
                        $marks_category = "Passing";
                        break;
                    case ($marks_obtained >= 0 && $marks_obtained <= 50):
                        $marks_category = "Resit";
                        break;
                }
            }

            $total_marks_obtained += $marks_obtained;
            $total_marks_out_of += $marks_out_of;

            $total_marks_out_of_100 = $total_marks_obtained * 100 / $total_marks_out_of;
            switch($total_marks_out_of_100)
            {
                case ($total_marks_out_of_100 >= 71):
                    $total_marks_category = "Distinction";
                    break;
                case ($total_marks_out_of_100 >= 61 && $total_marks_out_of_100 <= 70):
                    $total_marks_category = "Merit";
                    break;
                case ($total_marks_out_of_100 >= 51 && $total_marks_out_of_100 <= 60):
                    $total_marks_category = "Passing";
                    break;
                case ($total_marks_out_of_100 >= 0 && $total_marks_out_of_100 <= 50):
                    $total_marks_category = "Resit";
                    break;
            }
        }
        
        
        $pm_details_array = array(
            'heading' => 'Assignment Details',
            'id' => $id,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'is_select' => $is_select,
            'stream' => $stream,
            'domain' => $domain,
            'title' => $title,
            'description' => $description,
            'deadline' => $deadline,
            'budget' => $budget, 
            'status' => $assignment_status,
            'marks_obtained' => $marks_obtained,
            'marks_out_of' => $marks_out_of,
            'marks_category' => $marks_category,
            'feedback' => $feedback,
            'marks_added_on' => $marks_added_on,
            'pm_id' => $pm_details_data['project_manager'],
            'freelancers' => $freelancer_array
        );
        array_push($details_array, $pm_details_array);
    }
    array_push($data_array, $details_array);

    // echo json_encode($data_array);

    $marks_details_array = array(
        // 'assignment_details_sql' => $assignment_details_sql,
        'heading' => 'Marks Details',
        'total_marks_obtained' => $total_marks_obtained,
        'total_marks_out_of' => $total_marks_out_of,
        'total_marks_out_of_100' => $total_marks_out_of_100,
        'total_marks_category' => $total_marks_category,
    );

    array_push($data_array, $marks_details_array);


    echo json_encode($data_array);
?>