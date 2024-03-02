<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['id'];
    // $logged_in_user_role = $_GET['role'];
    $logged_in_id = $_GET['logged_in_id'];

    $freelancer_array = array();

    $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE id = '$freelancer_id'";
    $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
    $get_freelancer_details_data = mysqli_fetch_assoc($get_freelancer_details_result);
    $get_freelancer_details_count = mysqli_num_rows($get_freelancer_details_result);

    if($get_freelancer_details_count != 1)
    {
        echo json_encode(array(
            'status' => 'error', 
            'message' => 'Freelancer not found'
        ));
        exit();
    }
    else
    {
        $last_freelancer_id_sql = "SELECT * FROM `freelancers_map` ORDER BY id DESC LIMIT 1";
        $last_freelancer_id_result = mysqli_query($conn, $last_freelancer_id_sql);
        $last_freelancer_id_data = mysqli_fetch_assoc($last_freelancer_id_result);
        $last_freelancer_id = $last_freelancer_id_data['id'];

        $first_freelancer_id_sql = "SELECT * FROM `freelancers_map` ORDER BY id ASC LIMIT 1";
        $first_freelancer_id_result = mysqli_query($conn, $first_freelancer_id_sql);
        $first_freelancer_id_data = mysqli_fetch_assoc($first_freelancer_id_result);
        $first_freelancer_id = $first_freelancer_id_data['id'];

        $previous_freelancer_sql = "SELECT * FROM freelancers_map WHERE id = (SELECT MAX(id) FROM freelancers_map WHERE id < '$freelancer_id')";
        $previous_freelancer_result = mysqli_query($conn, $previous_freelancer_sql);
        $previous_freelancer_data = mysqli_fetch_assoc($previous_freelancer_result);
        $previous_freelancer_id = $previous_freelancer_data['id'];

        $next_freelancer_sql = "SELECT * FROM freelancers_map WHERE id = (SELECT MIN(id) FROM freelancers_map WHERE id > '$freelancer_id')";
        $next_freelancer_result = mysqli_query($conn, $next_freelancer_sql);
        $next_freelancer_data = mysqli_fetch_assoc($next_freelancer_result);
        $next_freelancer_id = $next_freelancer_data['id'];

        if($freelancer_id == $last_freelancer_id)
        {
            $next_freelancer_id = $first_freelancer_id;
        }

        if($freelancer_id == $first_freelancer_id)
        {
            $previous_freelancer_id = $last_freelancer_id;
        }

        $data = array();

        $arrow_array = array(
            'previous' => $previous_freelancer_id,
            'next' => $next_freelancer_id,
        );

        $chats_array = array();

        $get_team_and_user_personal_chats = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Personal' ORDER BY `id` ASC";
        $get_team_and_user_personal_chats_result = mysqli_query($conn, $get_team_and_user_personal_chats);
        while($get_team_and_user_personal_chats_row = mysqli_fetch_assoc($get_team_and_user_personal_chats_result))
        {
            $chat_id = $get_team_and_user_personal_chats_row['chat_id'];
            $members = $get_team_and_user_personal_chats_row['members'];
            $members = json_decode($members, true);
            $created_by_id = $members['created_by_id'];
            $chat_freelancer_id = $members['freelancer_id'];

            if($chat_freelancer_id = $freelancer_id)
            {
                $chat_status = "Chat Exists";
            }
            else
            {
                $chat_status = "Chat doesn't exist";
            }

            if($chat_status == "Chat Exists")
            {
                $present_chat_id = $chat_id;
                $chat_data = array(
                    "chat_id" => $chat_id,
                    "status" => $chat_status,
                );
                array_push($chats_array, $chat_data);
            }
        }

        array_push($data, $arrow_array);
        
        $basic_details = array(
            'id' => $get_freelancer_details_data['id'],
            'name' => $get_freelancer_details_data['firstname'] . " " . $get_freelancer_details_data['lastname'],
            'email' => $get_freelancer_details_data['email'],
            'country_code' => $get_freelancer_details_data['country_code'],
            'country_name' => $get_freelancer_details_data['country_name'],
            'number' => $get_freelancer_details_data['number'],
            'whatsapp' => $get_freelancer_details_data['whatsapp'],
            'gender' => $get_freelancer_details_data['gender'],
            'address' => $get_freelancer_details_data['address'],
            'city' => $get_freelancer_details_data['city'],
            'state' => $get_freelancer_details_data['state'],
            'pincode' => $get_freelancer_details_data['pincode'],
            'chats' => $chats_array,
            // 'approval status' => $get_freelancer_details_data['is_approved'],
            'technical_status' => array(
                'form_filled' => $get_freelancer_details_data['technical_form_filled'],
                'interview_conducted' => $get_freelancer_details_data['technical_interview_conducted'],
                'agreement_sent' => $get_freelancer_details_data['technical_agreement_sent'],
                'agreement_received' => $get_freelancer_details_data['technical_agreement_received'],
                'is_approved' => $get_freelancer_details_data['technical_is_approved'],
            ),
            'non_technical_status' => array(
                'form_filled' => $get_freelancer_details_data['non_technical_form_filled'],
                'interview_conducted' => $get_freelancer_details_data['non_technical_interview_conducted'],
                'agreement_sent' => $get_freelancer_details_data['non_technical_agreement_sent'],
                'agreement_received' => $get_freelancer_details_data['non_technical_agreement_received'],
                'is_approved' => $get_freelancer_details_data['non_technical_is_approved'],
            ),
        );

        array_push($data, $basic_details);

        if($get_freelancer_details_data['technical'] == 1)
        {
            // fetch details from technical table and append array
            $fetch_technical_details_sql = "SELECT * FROM `freelancers_technical` WHERE freelancer_id = '$freelancer_id'";
            $fetch_technical_details_result = mysqli_query($conn, $fetch_technical_details_sql);
            $fetch_technical_details_data = mysqli_fetch_assoc($fetch_technical_details_result);

            $assignment_type = $fetch_technical_details_data['assignment_type'];
            $assignment_type = json_decode($assignment_type);

            $subject_tags = $fetch_technical_details_data['subject_tags'];
            $subject_tags = json_decode($subject_tags);

            $technical_details = array(
                'domains' => $fetch_technical_details_data['domains'],
                'assignment_type' => $assignment_type,
                'qualification' => $fetch_technical_details_data['qualification'],
                'working_hours' => $fetch_technical_details_data['working_hours'],
                'subject_tags' => $subject_tags,
                'past_experience' => $fetch_technical_details_data['past_experience'],
                'typing_speed' => $fetch_technical_details_data['typing_speed'],
                'work_links' => $fetch_technical_details_data['work_links'],
                'linkedin' => $fetch_technical_details_data['linkedin'],
                'experience' => $fetch_technical_details_data['experience'],
                'past_work_files' => $fetch_technical_details_data['past_work_files'],
                'resume' => $fetch_technical_details_data['resume'],
                'profile_photo' => $fetch_technical_details_data['profile_photo'],
                'date_of_submission' => $fetch_technical_details_data['date_of_submission'],
                'freelancer_progress' => array(
                    'form_filled' => $get_freelancer_details_data['technical_form_filled'],
                    'interview_conducted' => $get_freelancer_details_data['technical_interview_conducted'],
                    'agreement_sent' => $get_freelancer_details_data['technical_agreement_sent'],
                    'agreement_received' => $get_freelancer_details_data['technical_agreement_received'],
                    'is_approved' => $get_freelancer_details_data['technical_is_approved'],
                ),
            );
            array_push($data, $technical_details);
        }

        if($get_freelancer_details_data['non technical'] == 1)
        {
            // fetch details from non technical table and append array
            $fetch_technical_details_sql = "SELECT * FROM `freelancers_nontechnical` WHERE freelancer_id = '$freelancer_id'";
            $fetch_technical_details_result = mysqli_query($conn, $fetch_technical_details_sql);
            $fetch_technical_details_data = mysqli_fetch_assoc($fetch_technical_details_result);

            $assignment_type = $fetch_technical_details_data['assignment_type'];
            $assignment_type = json_decode($assignment_type);

            $subject_tags = $fetch_technical_details_data['subject_tags'];
            $subject_tags = json_decode($subject_tags);

            $technical_details = array(
                'domains' => $fetch_technical_details_data['domains'],
                'assignment_type' => $assignment_type,
                'qualification' => $fetch_technical_details_data['qualification'],
                'working_hours' => $fetch_technical_details_data['working_hours'],
                'subject_tags' => $subject_tags,
                'past_experience' => $fetch_technical_details_data['past_experience'],
                'typing_speed' => $fetch_technical_details_data['typing_speed'],
                'work_links' => $fetch_technical_details_data['work_links'],
                'linkedin' => $fetch_technical_details_data['linkedin'],
                'experience' => $fetch_technical_details_data['experience'],
                'past_work_files' => $fetch_technical_details_data['past_work_files'],
                'resume' => $fetch_technical_details_data['resume'],
                'profile_photo' => $fetch_technical_details_data['profile_photo'],
                'date_of_submission' => $fetch_technical_details_data['date_of_submission'],
                'freelancer_progress' => array(
                    'form_filled' => $get_freelancer_details_data['technical_form_filled'],
                    'interview_conducted' => $get_freelancer_details_data['technical_interview_conducted'],
                    'agreement_sent' => $get_freelancer_details_data['technical_agreement_sent'],
                    'agreement_received' => $get_freelancer_details_data['technical_agreement_received'],
                    'is_approved' => $get_freelancer_details_data['technical_is_approved'],
                ),
            );
            array_push($data, $technical_details);
        }
        
        $get_team_personal_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Freelancer Personal' ORDER BY `id` ASC";
        $get_team_personal_chats_result = mysqli_query($conn, $get_team_personal_chats_sql);

        $chats = array();

        while($get_team_personal_chat_data = mysqli_fetch_assoc($get_team_personal_chats_result))
        {
            $chat_id = $get_team_personal_chat_data['id'];
            $members = $get_team_personal_chat_data['members'];
            $members = json_decode($members, true);
            $created_by_id = $members['created_by_id'];
            // $freelancer_id = $members['freelancer_id'];
            
            // if($members['created_by_id'] == $student_id && $members['freelancer_id'] == $logged_in_id)
            // {
            //     $chat_status = "Chat exists";
            // }
            // else 
            if($members['created_by_id'] == $logged_in_id && $members['freelancer_id'] == $freelancer_id)
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
                    // "student_id" => $student_id,
                    // "logged_in_id" => $logged_in_id,
                    // "sql" => $get_team_personal_chats_sql,
                );
                array_push($chats, $chat_data);
            }
            else
            {
                // $present_chat_id == NULL;
                // $chat_data = array(
                //     "status" => $chat_status,
                //     "present_chat_id" => $chat_id,
                //     "sql" => $get_team_personal_chats_sql,
                // );
                // array_push($chats, $chat_data);
            }            
        }

        // array_push($data, $chats);

        $freelancer_inquiries_sql = "SELECT * FROM `assignment_inquiries` WHERE freelancer_id = '$freelancer_id' ORDER BY `id` DESC";
        $freelancer_inquiries_result = mysqli_query($conn, $freelancer_inquiries_sql);
        $freelancer_inquiries_count = mysqli_num_rows($freelancer_inquiries_result);

        $freelancer_inquiries = array();
        while($freelancer_inquiries_data = mysqli_fetch_assoc($freelancer_inquiries_result))
        {
            $inquiry_id = $freelancer_inquiries_data['id'];
            $assignment_id = $freelancer_inquiries_data['assignment_id'];

            $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
            $assignment_details_result = mysqli_query($conn, $assignment_details_sql);
            $assignment_details_data = mysqli_fetch_assoc($assignment_details_result);
            
            $assignment_title = $assignment_details_data['title'];
            $assignment_deadline = $assignment_details_data['deadline'];
            $assignment_budget = $assignment_details_data['budget'];
            $marks_obtained = $assignment_details_data['marks_obtained'];
            $marks_out_of = $assignment_details_data['marks_out_of'];
            $feedback = $assignment_details_data['feedback'];
            $marks_added_on = $assignment_details_data['marks_added_on'];

            if($assignment_details_data['resit'] == 1)
            {
                $status = "Resit";
            }
            else
            {
                if($assignment_details_data['lost'] == 1)
                {
                    $status = "Lost";
                }
                else
                {
                    if($assignment_details_data['review_recieved'] == 1)
                    {
                        $status = "Review Received";
                    }
                    else
                    {
                        if($assignment_details_data['completed'] == 1)
                        {
                            $status = "Completed";
                        }
                        else
                        {
                            if($assignment_details_data['assigned_to_freelancer'] == 1)
                            {
                                $status = "Assigned to Freelancer";
                            }
                            else
                            {
                                if($assignment_details_data['assigned_to_pm'] == 1)
                                {
                                    $status = "Assigned to PM";
                                }
                                else
                                {
                                    if($assignment_details_data['under_process'] == 1)
                                    {
                                        $status = "Under Process";
                                    }
                                    else
                                    {
                                        if($assignment_details_data['posted'] == 1)
                                        {
                                            $status = "Posted";
                                        }
                                        else
                                        {
                                            $status = "Error";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
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
            }
            
            
            $inquiry = array(
                'inquiry_id' => $inquiry_id,
                'assignment_id' => $assignment_id,
                'assignment_title' => $assignment_title,
                'assignment_deadline' => $assignment_deadline,
                'assignment_budget' => $assignment_budget,
                'marks_obtained' => $marks_obtained,
                'marks_out_of' => $marks_out_of,
                'marks_category' => $marks_category,
                'feedback' => $feedback,
                'marks_added_on' => $marks_added_on,
                'status' => $status,
            );
            
            array_push($freelancer_inquiries, $inquiry);
        }

        array_push($data, $freelancer_inquiries);

        $total_marks_obtained = 0;
        $total_marks_out_of = 0;

        $freelancer_assigned_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = '$freelancer_id' AND `status` = 1";
        $freelancer_assigned_result = mysqli_query($conn, $freelancer_assigned_sql);
        $freelancer_assigned_count = mysqli_num_rows($freelancer_assigned_result);

        $freelancer_assigned = array(
            // 'assigned' => $freelancer_assigned_count,
        );

        while($freelancer_assigned_data = mysqli_fetch_assoc($freelancer_assigned_result))
        {
            $assignment_id = $freelancer_assigned_data['assignment_id'];

            $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
            $assignment_details_result = mysqli_query($conn, $assignment_details_sql);
            $assignment_details_data = mysqli_fetch_assoc($assignment_details_result);
            
            $assignment_title = $assignment_details_data['title'];
            $assignment_deadline = $assignment_details_data['deadline'];
            $assignment_budget = $assignment_details_data['budget'];
            $marks_obtained = $assignment_details_data['marks_obtained'];
            $marks_out_of = $assignment_details_data['marks_out_of'];
            $feedback = $assignment_details_data['feedback'];
            $marks_added_on = $assignment_details_data['marks_added_on'];

            if($assignment_details_data['resit'] == 1)
            {
                $status = "Resit";
            }
            else
            {
                if($assignment_details_data['lost'] == 1)
                {
                    $status = "Lost";
                }
                else
                {
                    if($assignment_details_data['review_recieved'] == 1)
                    {
                        $status = "Review Received";
                    }
                    else
                    {
                        if($assignment_details_data['completed'] == 1)
                        {
                            $status = "Completed";
                        }
                        else
                        {
                            if($assignment_details_data['assigned_to_freelancer'] == 1)
                            {
                                $status = "Assigned to Freelancer";
                            }
                            else
                            {
                                if($assignment_details_data['assigned_to_pm'] == 1)
                                {
                                    $status = "Assigned to PM";
                                }
                                else
                                {
                                    if($assignment_details_data['under_process'] == 1)
                                    {
                                        $status = "Under Process";
                                    }
                                    else
                                    {
                                        if($assignment_details_data['posted'] == 1)
                                        {
                                            $status = "Posted";
                                        }
                                        else
                                        {
                                            $status = "Error";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
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
            
            $assigned = array(
                'assignment_id' => $assignment_id,
                'assignment_title' => $assignment_title,
                'assignment_deadline' => $assignment_deadline,
                'assignment_budget' => $assignment_budget,
                'marks_obtained' => $marks_obtained,
                'marks_out_of' => $marks_out_of,
                'marks_category' => $marks_category,
                'feedback' => $feedback,
                'marks_added_on' => $marks_added_on,
                'status' => $status,
            );
            array_push($freelancer_assigned, $assigned);
        }

        array_push($data, $freelancer_assigned);

        $marks_data = array(
            'total_marks_obtained' => $total_marks_obtained,
            'total_marks_out_of' => $total_marks_out_of,
            'total_marks_category' => $total_marks_category,
        );
        array_push($data, $marks_data);
    }

    echo json_encode($data);
    
?>