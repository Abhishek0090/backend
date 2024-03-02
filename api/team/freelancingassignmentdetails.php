<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $assignment_id = $_GET['id'];
    $role = $_GET['role'];
    $logged_in_id = $_GET['logged_in_id'];

    $map_array = array();

    $check_assignment_map_sql = "SELECT * FROM `assignment_map` WHERE `id` = '$assignment_id'";
    $check_assignment_map_result = mysqli_query($conn, $check_assignment_map_sql);
    $check_assignment_map_data = mysqli_fetch_assoc($check_assignment_map_result);
    $check_assignment_map_count = mysqli_num_rows($check_assignment_map_result);

    if($check_assignment_map_count == 0)
    {
        echo json_encode("No assignment found");
        exit();
    }
    else
    {
        $assignment_domain = $check_assignment_map_data['domain'];
        
        if($assignment_domain == "Writer")
        {
            echo json_encode("Writer Assignment");
            exit();
        }
        else
        {
            $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
            $assignment_details_result = mysqli_query($conn, $assignment_details_sql);
            $assignment_details_data = mysqli_fetch_assoc($assignment_details_result);

            $stream = $assignment_details_data['stream'];
            $title = $assignment_details_data['title'];
            $description = $assignment_details_data['description'];
            $course = $assignment_details_data['course'];
            $level = $assignment_details_data['level'];
            $type = $assignment_details_data['type'];
            $type = json_decode($type);
            $subject_tags = $assignment_details_data['subject_tags'];
            $subject_tags = json_decode($subject_tags);
            $deadline = $assignment_details_data['deadline'];
            $budget = $assignment_details_data['budget'];
            $files = $assignment_details_data['files'];
            $submission_date = $assignment_details_data['submission_date'];
            $submitted_by = $assignment_details_data['submitted_by'];
            $project_manager = $assignment_details_data['project_manager'];
            $freelancer = $assignment_details_data['freelancer'];
            $posted = $assignment_details_data['posted'];
            $under_process = $assignment_details_data['under_process'];
            $assigned_to_pm = $assignment_details_data['assigned_to_pm'];
            $assigned_to_freelancer = $assignment_details_data['assigned_to_freelancer'];
            $completed = $assignment_details_data['completed'];
            $review_received = $assignment_details_data['review_recieved'];
            $lost = $assignment_details_data['lost'];
            $resit = $assignment_details_data['resit'];
            $marks_obtained = $assignment_details_data['marks_obtained'];
            $marks_out_of = $assignment_details_data['marks_out_of'];
            $feedback = $assignment_details_data['feedback'];
            $marks_added_on = $assignment_details_data['marks_added_on'];
            $marks_added_by = $assignment_details_data['marks_added_by'];

            $last_assignment_id_sql = "SELECT `assignment_id` FROM `assignment_freelance` ORDER BY `id` DESC LIMIT 1";
            $last_assignment_id_result = mysqli_query($conn, $last_assignment_id_sql);
            $last_assignment_id_data = mysqli_fetch_assoc($last_assignment_id_result);
            $last_assignment_id = $last_assignment_id_data['assignment_id'];

            $first_assignment_id_sql = "SELECT `assignment_id` FROM `assignment_freelance` ORDER BY `id` ASC LIMIT 1";
            $first_assignment_id_result = mysqli_query($conn, $first_assignment_id_sql);
            $first_assignment_id_data = mysqli_fetch_assoc($first_assignment_id_result);
            $first_assignment_id = $first_assignment_id_data['assignment_id'];
            
            $next_assignment_sql = "SELECT * FROM assignment_map WHERE id = (SELECT MIN(id) FROM assignment_map WHERE id > '$assignment_id')";
            $next_id_result = mysqli_query($conn, $next_assignment_sql);
            $next_id_data = mysqli_fetch_assoc($next_id_result);
            $next_assignment_id = $next_id_data['id'];

            $previous_assignment_sql = "SELECT * FROM assignment_map WHERE id = (SELECT MAX(id) FROM assignment_map WHERE id < '$assignment_id')";
            $previous_id_result = mysqli_query($conn, $previous_assignment_sql);
            $previous_id_data = mysqli_fetch_assoc($previous_id_result);
            $previous_assignment_id = $previous_id_data['id'];

            if($previous_assignment_id == null)
            {
                $previous_assignment_id = $last_assignment_id;
            }

            if($next_assignment_id == null)
            {
                $next_assignment_id = $first_assignment_id;
            }

            if($submitted_by != "student")
            {
                // get id by removing "team_member_" from the string "team_member_1"
                $submitted_by = substr($submitted_by, 12);
            }

            $assigned_freelancer = array();
            $select_assigned_freelancers = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = $assignment_id AND `status` = 1";
            $select_assigned_freelancers_result = mysqli_query($conn, $select_assigned_freelancers);
            while($select_assigned_freelancers_row = mysqli_fetch_array($select_assigned_freelancers_result))
            {
                $assigned_freelancer_id = $select_assigned_freelancers_row['freelancer_id'];
                array_push($assigned_freelancer, $assigned_freelancer_id);
            }

            $assignment_details = array(
                // 'assignment_details_sql' => $assignment_details_sql,
                'details' => "Assignment Details",
                'assignment_id' => $assignment_id,
                // 'first_assignment_id' => $first_assignment_id,
                // 'last_assignment_id' => $last_assignment_id,
                'previous_assignment_id' => $previous_assignment_id,
                'next_assignment_id' => $next_assignment_id,
                'next_assignment_sql' => $next_assignment_sql,
                'stream' => $stream,
                'title' => $title,
                'description' => $description,
                'course' => $course,
                'level' => $level,
                'type' => $type,
                'subject_tags' => $subject_tags,
                'deadline' => $deadline,
                'budget' => $budget,
                'files' => $files,
                'submission_date' => $submission_date,
                'submitted_by' => $submitted_by,
                'project_manager' => $project_manager,
                'freelancer' => $assigned_freelancer,
                'posted' => $posted,
                'under_process' => $under_process,
                'assigned_to_pm' => $assigned_to_pm,
                'assigned_to_freelancer' => $assigned_to_freelancer,
                'completed' => $completed,
                'review_received' => $review_received,
                'lost' => $lost,
                'resit' => $resit,
            );

            array_push($map_array, $assignment_details);

            // create array of marks details and push it in map array

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
            }
            
            
            $marks_details = array(
                "details" => "Marks Details",
                "marks_obtained" => $marks_obtained,
                "marks_out_of" => $marks_out_of,
                "marks_category" => $marks_category,
                "feedback" => $feedback,
                "marks_added_on" => $marks_added_on,
                "marks_added_by" => $marks_added_by,
            );

            array_push($map_array, $marks_details);

            $get_team_assignment_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team Assignment' AND `assignment_id` = $assignment_id ORDER BY `id` ASC";
            $get_team_assignment_chats_result = mysqli_query($conn, $get_team_assignment_chats_sql);
            $team_assignment_chat = array();
            while($get_team_assignment_chat_data = mysqli_fetch_assoc($get_team_assignment_chats_result))
            {
                $chat_id = $get_team_assignment_chat_data['id'];

                $team_assignment_chat_data = array(
                    "chat_type" => "Team Assignment",
                    "chat_id" => $chat_id,
                );
                array_push($team_assignment_chat, $team_assignment_chat_data);
            }

            $get_team_and_freelancer_assignment_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Assignment' AND `assignment_id` = $assignment_id ORDER BY `id` ASC";
            $get_team_and_freelancer_assignment_chats_result = mysqli_query($conn, $get_team_and_freelancer_assignment_chats_sql);
            $team_and_freelancer_assignment_chat = array();
            while($get_team_and_freelancer_assignment_chat_data = mysqli_fetch_assoc($get_team_and_freelancer_assignment_chats_result))
            {
                $chat_id = $get_team_and_freelancer_assignment_chat_data['id'];

                $team_and_freelancer_assignment_chat_data = array(
                    "chat_type" => "Team and Freelancer Assignment",
                    "chat_id" => $chat_id,
                );
                array_push($team_and_freelancer_assignment_chat, $team_and_freelancer_assignment_chat_data);
            }

            $get_team_and_student_assignment_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Student Assignment' AND `assignment_id` = $assignment_id ORDER BY `id` ASC";
            $get_team_and_student_assignment_chats_result = mysqli_query($conn, $get_team_and_student_assignment_chats_sql);
            $team_and_student_assignment_chat = array();
            while($get_team_and_student_assignment_chat_data = mysqli_fetch_assoc($get_team_and_student_assignment_chats_result))
            {
                $chat_id = $get_team_and_student_assignment_chat_data['id'];

                $get_team_and_student_assignment_chat_data = array(
                    "chat_type" => "Team and Student Assignment",
                    "chat_id" => $chat_id,
                );
                array_push($team_and_student_assignment_chat, $get_team_and_student_assignment_chat_data);
            }

            $get_assignment_group_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Assignment Group' AND `assignment_id` = $assignment_id ORDER BY `id` ASC";
            $get_assignment_group_chats_result = mysqli_query($conn, $get_assignment_group_chats_sql);
            $assignment_group_chat = array();
            while($get_assignment_group_chat_data = mysqli_fetch_assoc($get_assignment_group_chats_result))
            {
                $chat_id = $get_assignment_group_chat_data['id'];

                $get_assignment_group_chat_data = array(
                    "chat_type" => "Assignment Group",
                    "chat_id" => $chat_id,
                );
                array_push($assignment_group_chat, $get_assignment_group_chat_data);
            }

            $chats = array(
                "details" => "Chat Details",
                "team_assignment" => $team_assignment_chat,
                "team_and_freelancer_assignment" => $team_and_freelancer_assignment_chat,
                "team_and_student_assignment" => $team_and_student_assignment_chat,
                "assignment_group" => $assignment_group_chat
            );

            array_push($map_array, $chats);

            if($lost == 1)
            {
                $lost_reason_sql = "SELECT * FROM `lost_reason` WHERE `assign_id` = $assignment_id ORDER BY `assign_id` DESC LIMIT 1";
                $lost_reason_result = mysqli_query($conn, $lost_reason_sql);
                $lost_reason_row = mysqli_fetch_assoc($lost_reason_result);
                $lost_reason = $lost_reason_row['reason'];
                $lost_reason_date = $lost_reason_row['date_time'];
                $lost_reason = array(
                    "Details" => "Lost Reason",
                    "reason" => $lost_reason,
                    "date" => $lost_reason_date,
                );
                array_push($map_array, $lost_reason);
            }

            $user_id = $check_assignment_map_data['user_id'];

            $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
            $get_user_details_result = mysqli_query($conn, $get_user_details_sql);
            $get_user_details_data = mysqli_fetch_assoc($get_user_details_result);

            $user_first_name = $get_user_details_data['firstname'];
            $user_last_name = $get_user_details_data['lastname'];
            $user_email = $get_user_details_data['email'];
            $user_country_name = $get_user_details_data['country_name'];
            $user_country_code = $get_user_details_data['country_code'];
            $user_number = $get_user_details_data['number'];
            $user_address = $get_user_details_data['address'];
            $user_wallet = $get_user_details_data['wallet'];
            $user_date_of_birth = $get_user_details_data['date_of_birth'];
            $affiliate_code_by = $get_user_details_data['affiliate_code_by'];
            if($affiliate_code_by != null)
            {
                $get_affiliate_data_sql = "SELECT * FROM `affiliate_payments` WHERE `assignment_id` = '$assignment_id' AND `status` = 1 ORDER BY `id` DESC LIMIT 1";
                $get_affiliate_data_result = mysqli_query($conn, $get_affiliate_data_sql);
                $get_affiliate_data_data = mysqli_fetch_assoc($get_affiliate_data_result);
                $affiliate_data_status = $get_affiliate_data_data['status'];
                $affiliate_data_amount = $get_affiliate_data_data['amount'];
                $affiliate_data_added_on = $get_affiliate_data_data['added_on'];
                $affiliate_data_paid_on = $get_affiliate_data_data['paid_on'];

                $select_affiliated_user_sql = "SELECT * FROM `users` WHERE `id` = '$affiliate_code_by'";
                $select_affiliated_user_result = mysqli_query($conn, $select_affiliated_user_sql);
                $select_affiliated_user_data = mysqli_fetch_assoc($select_affiliated_user_result);
                $affiliate_code_by_name = $select_affiliated_user_data['firstname']. " ". $select_affiliated_user_data['lastname'];
            }
            else
            {
                $affiliate_code_by_name = "Not Affiliated";
                $affiliate_data_status = "null";
                $affiliate_data_amount = "null";
                $affiliate_data_added_on = "null";
                $affiliate_data_paid_on = "null";
            }
            $affiliate_data = array(
                "Details" => "Affiliate Details",
                "affiliate_code_by" => $affiliate_code_by,
                "affiliate_code_by_name" => $affiliate_code_by_name,
                "affiliate_data_status" => $affiliate_data_status,
                "affiliate_data_amount" => $affiliate_data_amount,
                "affiliate_data_added_on" => $affiliate_data_added_on,
                "affiliate_data_paid_on" => $affiliate_data_paid_on,
            );

            $user_details = array(
                'Details' => 'User Details',
                'user_id' => $user_id,
                'user_first_name' => $user_first_name,
                'user_last_name' => $user_last_name,
                'user_email' => $user_email,
                'user_country_name' => $user_country_name,
                'user_country_code' => $user_country_code,
                'user_number' => $user_number,
                'user_address' => $user_address,
                'user_wallet' => $user_wallet,
                'user_date_of_birth' => $user_date_of_birth,
                'affiliate_data' => $affiliate_data,
            );

            array_push($map_array, $user_details);

            // fetch pm details and store them in array

            $pm_details = array();

            $get_pm_details_sql = "SELECT * FROM `team` WHERE (`role` = 'admin' OR `role` = 'Admin' OR `role` = 'pm') AND `is_active` = 1 ORDER BY `id` DESC";
            
            $get_pm_details_result = mysqli_query($conn, $get_pm_details_sql);
            while($get_pm_details_row = mysqli_fetch_assoc($get_pm_details_result))
            {
                if($get_pm_details_row['id'] == $project_manager)
                {
                    $status = "Assigned";
                }
                else
                {
                    $status = "Not Assigned";
                }
                if($get_pm_details_row['is_technical'] == 1)
                {
                    $domain = "Technical";
                }
                else
                {
                    $domain = "Non-Technical";
                }
                $pm = array(
                    "Details" => "Project Manager Details",
                    "id" => $get_pm_details_row['id'],
                    "name" => $get_pm_details_row['name'],
                    "number" => $get_pm_details_row['number'],
                    "status" => $status,
                    "domain" => $domain,
                );

                array_push($pm_details, $pm);
            }
            
            array_push($map_array, $pm_details);

            // fetch freelancer details and store them in array

            $freelancer_details = array();

            $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `technical_is_approved` = 1 OR `non_technical_is_approved` = 1 ORDER BY `id` DESC";
            
            $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
            while($get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details_result))
            {
                $freelancer_id = $get_freelancer_details_row['id'];

                $check_if_inquiry_sent_sql = "SELECT * FROM `assignment_inquiries` WHERE `freelancer_id` = $freelancer_id AND `assignment_id` = $assignment_id AND `status` = 1";
                $check_if_inquiry_sent_result = mysqli_query($conn, $check_if_inquiry_sent_sql);
                $check_if_inquiry_sent_data = mysqli_fetch_assoc($check_if_inquiry_sent_result);
                if($check_if_inquiry_sent_data)
                {
                    $inquiry_status = "Inquiry Sent";
                }
                else
                {
                    $inquiry_status = "Inquiry Not Sent";
                }

                $check_if_assignment_assigned_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `assignment_id` = $assignment_id AND `status` = 1";
                $check_if_assignment_assigned_result = mysqli_query($conn, $check_if_assignment_assigned_sql);
                $check_if_assignment_assigned_data = mysqli_fetch_assoc($check_if_assignment_assigned_result);
                if($check_if_assignment_assigned_data)
                {
                    $assigned_status = "Assigned";
                }
                else
                {
                    $assigned_status = "Not Assigned";
                }

                $freelancer = array(
                    "Details" => "Freelancer Details",
                    "id" => $get_freelancer_details_row['id'],
                    "name" => $get_freelancer_details_row['firstname']. " ". $get_freelancer_details_row['lastname'],
                    "country_code" => $get_freelancer_details_row['country_code'],
                    "number" => $get_freelancer_details_row['number'],
                    "whatsapp_number" => $get_freelancer_details_row['whatsapp'],
                    "swing_status" => $get_freelancer_details_row['is_active'],
                    // "check_if_assigned_data" => $check_if_assignment_assigned_data,
                    "inquiry_status" => $inquiry_status,
                    "assigned_status" => $assigned_status,
                );
                array_push($freelancer_details, $freelancer);
            }

            array_push($map_array, $freelancer_details);
            
        }
    }

    echo json_encode($map_array);    
?>