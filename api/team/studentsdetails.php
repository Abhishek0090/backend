<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    
    $id = $_GET['id'];
    $logged_in_id = $_GET['logged_in_id'];

    $map_array = array();
    $sub_data_array = array();

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_marks_out_of_100 = 0;
    $total_marks_category = "";
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;
    

    $students_details = "SELECT * FROM `users` WHERE `id` = '$id' ORDER BY `id` DESC";
    $students_details_result = mysqli_query($conn,$students_details);
    while($students_details_data = mysqli_fetch_assoc($students_details_result))
    {
        $id = $students_details_data['id'];
        $firstname = $students_details_data['firstname'];
        $lastname = $students_details_data['lastname'];
        $college = $students_details_data['college'];
        $email = $students_details_data['email'];
        $email_verified = $students_details_data['email_verified'];
        $country_name  = $students_details_data['country_name'];
        $country_code  = $students_details_data['country_code'];
        $number = $students_details_data['number'];
        $number_verified = $students_details_data['number_verified'];
        $address = $students_details_data['address']; 
        $university = $students_details_data['university'];
        $course = $students_details_data['course'];
        $affiliate_code = $students_details_data['affiliate_code'];
        $wallet = $students_details_data['wallet']; 
        $is_select = $students_details_data['is_select'];
        $signin_method = $students_details_data['signin_method'];

        if($signin_method == "google" || $signin_method == "manual")
        {
            $account_created_by = "student";
        }
        else
        {
            $account_created_by = substr($signin_method, 10);
            // $account_created_by = "admin";
        }

        if($is_select == 1)
        {
            $get_select_details_sql = "SELECT * FROM `users_select` WHERE `user_id` = '$id'";
            $get_select_details_result = mysqli_query($conn, $get_select_details_sql) or die(mysqli_error($conn));
            $get_select_details_row = mysqli_fetch_assoc($get_select_details_result);

            $addition_date = $get_select_details_row['addition_date'];
            $expiry_date = $get_select_details_row['expiry_date'];
        }

        $affiliate_users = array();
        $get_affiliated_users_sql = "SELECT * FROM `users` WHERE `affiliate_code_by` = '$id'";
        $get_affiliated_users_result = mysqli_query($conn, $get_affiliated_users_sql);
        while($get_affiliate_users_row = mysqli_fetch_assoc($get_affiliated_users_result))
        {
            $affiliated_user_id = $get_affiliate_users_row['id'];
            $affiliated_user_firstname = $get_affiliate_users_row['firstname'];
            $affiliated_user_lastname = $get_affiliate_users_row['lastname'];
            $affiliated_user_email = $get_affiliate_users_row['email'];
            $affiliate_user_country_name = $get_affiliate_users_row['country_name'];
            $affiliate_user_country_code = $get_affiliate_users_row['country_code'];
            $affiliated_user_number = $get_affiliate_users_row['number'];

            $affiliate_data = array(
                'affiliated_user_id' => $affiliated_user_id,
                'affiliated_user_firstname' => $affiliated_user_firstname,
                'affiliated_user_lastname' => $affiliated_user_lastname,
                'affiliated_user_email' => $affiliated_user_email,
                'affiliate_user_country_name' => $affiliate_user_country_name,
                'affiliate_user_country_code' => $affiliate_user_country_code,
                'affiliated_user_number' => $affiliated_user_number,
            );

            array_push($affiliate_users, $affiliate_data);
        }
        // array_push($map_array, $affiliate_users);


        $chats = array();
        $get_team_personal_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and User Personal' ORDER BY `id` ASC";
        $get_team_personal_chats_result = mysqli_query($conn, $get_team_personal_chats_sql);
        while($get_team_personal_chat_data = mysqli_fetch_assoc($get_team_personal_chats_result))
        {
            $chat_id = $get_team_personal_chat_data['id'];
            $members = $get_team_personal_chat_data['members'];
            $members = json_decode($members, true);
            $created_by_id = $members['created_by_id'];
            $user_id = $members['user_id'];
            
            if($members['created_by_id'] == $student_id && $members['user_id'] == $logged_in_id)
            {
                $chat_status = "Chat exists";
            }
            else if($members['created_by_id'] == $logged_in_id && $members['user_id'] == $id)
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
                );
                array_push($chats, $chat_data);
            }
            else
            {
                $present_chat_id == NULL;
                // $chat_data = array(
                //     "status" => $chat_status,
                //     "present_chat_id" => $chat_id,
                // );
                // array_push($chats, $chat_data);
            }            
        }

        $total_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id'";
        $total_assignments_count_result = mysqli_query($conn, $total_assignments_count_sql) or die(mysqli_error($conn));
        $total_assignments_count_row = mysqli_fetch_assoc($total_assignments_count_result);
        $total_assignments_count = $total_assignments_count_row['COUNT(*)'];
    
        $total_freelancing_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'Freelancer'";
        $total_freelancing_assignments_count_result = mysqli_query($conn, $total_freelancing_assignments_count_sql) or die(mysqli_error($conn));
        $total_freelancing_assignments_count_row = mysqli_fetch_assoc($total_freelancing_assignments_count_result);
        $total_freelancing_assignments_count = $total_freelancing_assignments_count_row['COUNT(*)'];
    
        $total_writing_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'Writing'";
        $total_writing_assignments_count_result = mysqli_query($conn, $total_writing_assignments_count_sql) or die(mysqli_error($conn));
        $total_writing_assignments_count_row = mysqli_fetch_assoc($total_writing_assignments_count_result);
        $total_writing_assignments_count = $total_writing_assignments_count_row['COUNT(*)'];
    
        $total_ed_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'ED'";
        $total_ed_assignments_count_result = mysqli_query($conn, $total_ed_assignments_count_sql) or die(mysqli_error($conn));
        $total_ed_assignments_count_row = mysqli_fetch_assoc($total_ed_assignments_count_result);
        $total_ed_assignments_count = $total_ed_assignments_count_row['COUNT(*)'];
    
        $total_typing_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'Typing'";
        $total_typing_assignments_count_result = mysqli_query($conn, $total_typing_assignments_count_sql) or die(mysqli_error($conn));
        $total_typing_assignments_count_row = mysqli_fetch_assoc($total_typing_assignments_count_result);
        $total_typing_assignments_count = $total_typing_assignments_count_row['COUNT(*)'];
    
        $total_art_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'Art'";
        $total_art_assignments_count_result = mysqli_query($conn, $total_art_assignments_count_sql) or die(mysqli_error($conn));
        $total_art_assignments_count_row = mysqli_fetch_assoc($total_art_assignments_count_result);
        $total_art_assignments_count = $total_art_assignments_count_row['COUNT(*)'];
    

        $get_assignment_map_sql = "SELECT * FROM `assignment_map` WHERE `user_id` = '$id' ORDER BY `id` DESC";
        $get_assignment_map_result = mysqli_query($conn, $get_assignment_map_sql);
    
        while($get_assignment_map_row = mysqli_fetch_assoc($get_assignment_map_result))
        {
            $assignment_id = $get_assignment_map_row['id'];
            $assignment_domain = $get_assignment_map_row['domain'];
    
            if($assignment_domain == "Freelancer" || $assignment_domain == "Programming" || $assignment_domain = "Freelancer Programming" || $assignment_domain = "Professional Writing" || $assignment_domain = "Freelancer Professional Writing" || $assignment_domain = "Academic Writing" || $assignment_domain = "Freelancer Academic Writing")
            {
                $get_assignment_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);
    
                $assignment_stream = $get_assignment_row['stream'];
                $assignment_title = $get_assignment_row['title'];
                $assignment_description = $get_assignment_row['description'];
                $assignment_course = $get_assignment_row['course'];
                $assignment_level = $get_assignment_row['level'];

                $assignment_type = $get_assignment_row['type'];
                $assignment_type = json_decode($assignment_type);

                $assignment_subject_tags = $get_assignment_row['subject_tags'];
                $assignment_subject_tags = json_decode($assignment_subject_tags);

                $assignment_deadline = $get_assignment_row['deadline'];
                $assignment_budget = $get_assignment_row['budget'];
                $assignment_files = $get_assignment_row['files'];
                $assignment_submission_date = $get_assignment_row['submission_date'];
                $assignment_project_manager = $get_assignment_row['project_manager'];

                $marks_obtained = $get_assignment_row['marks_obtained'];
                $marks_out_of = $get_assignment_row['marks_out_of'];
                $feedback = $get_assignment_row['feedback'];
                $marks_added_on = $get_assignment_row['marks_added_on'];
    
                if($assignment_project_manager != NULL)
                {
                    $get_project_manager_details_sql = "SELECT * FROM `team` WHERE `id` = '$assignment_project_manager'";
                    $get_project_manager_details_result = mysqli_query($conn, $get_project_manager_details_sql);
                    $get_project_manager_details_row = mysqli_fetch_assoc($get_project_manager_details_result);
    
                    $project_manager_name = $get_project_manager_details_row['name'];
                    $project_manager_email = $get_project_manager_details_row['email_old'];
                    $project_manager_number = $get_project_manager_details_row['number'];
                    $project_manager_number_whatsapp = $get_project_manager_details_row['number_whatsapp'];
    
                    $assignment_project_manager = array(
                        'project_manager_id' => $assignment_project_manager,
                        'project_manager_name' => $project_manager_name,
                        'project_manager_email' => $project_manager_email,
                        'project_manager_number' => $project_manager_number,
                        'project_manager_number_whatsapp' => $project_manager_number_whatsapp,
                    );
                }
    
                if($get_assignment_row['resit'] == 1)
                {
                    $assignment_status = "Resit";
                }
                else if($get_assignment_row['lost'] == 1)
                {
                    $assignment_status = "Lost";
                }
                else if($get_assignment_row['review_received'] == 1)
                {
                    $assignment_status = "Reviewed";
                }
                else if($get_assignment_row['completed'] == 1)
                {
                    $assignment_status = "Completed";
                }
                else if($get_assignment_row['assigned_to_freelancer'] == 1)
                {
                    $assignment_status = "Assigned to Freelancer";
                }
                else if($get_assignment_row['assigned_to_pm'] == 1)
                {
                    $assignment_status = "Assigned to Project Manager";
                }
                else if($get_assignment_row['under_process'] == 1)
                {
                    $assignment_status = "Under Process";
                }
                else if($get_assignment_row['posted'] == 1)
                {
                    $assignment_status = "Posted";
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
                            $total_distinction++;
                            break;
                        case ($total_marks_out_of_100 >= 61 && $total_marks_out_of_100 <= 70):
                            $total_marks_category = "Merit";
                            $total_merit++;
                            break;
                        case ($total_marks_out_of_100 >= 51 && $total_marks_out_of_100 <= 60):
                            $total_marks_category = "Passing";
                            $total_passing++;
                            break;
                        case ($total_marks_out_of_100 >= 0 && $total_marks_out_of_100 <= 50):
                            $total_marks_category = "Resit";
                            $total_resit++;
                            break;
                    }
                }

                
    
                $assignment_details = array(
                    'check_assignment_type' => "Freelancer",
                    'get_assignment_sql' => $get_assignment_sql,
                    'assignment_id' => $assignment_id,
                    'assignment_title' => $assignment_title,
                    'assignment_description' => $assignment_description,
                    'assignment_course' => $assignment_course,
                    'assignment_level' => $assignment_level,
                    'assignment_type' => $assignment_type,
                    'assignment_subject_tags' => $assignment_subject_tags,
                    'assignment_deadline' => $assignment_deadline,
                    'assignment_budget' => $assignment_budget,
                    // 'assignment_files' => $assignment_files,
                    'assignment_submission_date' => $assignment_submission_date,
                    'assignment_status' => $assignment_status,
                    'assignment_project_manager' => $assignment_project_manager,
                    'marks_obtained' => $marks_obtained,
                    'marks_out_of' => $marks_out_of,
                    'marks_category' => $marks_category,
                    'feedback' => $feedback,
                    'marks_added_on' => $marks_added_on,
                );
    
                array_push($sub_data_array, $assignment_details);
            }

    
            else if($assignment_domain == "Writing")
            {
                // get assignment details from writing table
                // append to array
                
                $get_assignment_sql = "SELECT * FROM `assignment_writing` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);
                
                // store all data in variables
                $assignment_city = $get_assignment_row['city'];
                $assignment_ink_color = $get_assignment_row['ink_color'];
                $assignment_submission_datetime = $get_assignment_row['submission_datetime'];
                $assignment_delivery_datetime = $get_assignment_row['delivery_datetime'];
                $assignment_copy = $get_assignment_row['copy'];
                $assignment_sheets = $get_assignment_row['sheets'];
                $assignment_sides = $get_assignment_row['sides'];
                $assignment_diagrams = $get_assignment_row['diagrams'];
                $assignment_content = $get_assignment_row['content'];
                $assignment_budget = $get_assignment_row['budget'];
                $assignment_is_active = $get_assignment_row['is_active'];
                $assignment_instructions = $get_assignment_row['instructions'];
    
                $assignment_details = array(
                    'check_assignment_type' => "Writing",
                    'assignment_id' => $assignment_id,
                    'assignment_city' => $assignment_city,
                    'assignment_ink_color' => $assignment_ink_color,
                    'assignment_submission_datetime' => $assignment_submission_datetime,
                    'assignment_delivery_datetime' => $assignment_delivery_datetime,
                    'assignment_copy' => $assignment_copy,
                    'assignment_sheets' => $assignment_sheets,
                    'assignment_sides' => $assignment_sides,
                    'assignment_diagrams' => $assignment_diagrams,
                    'assignment_content' => $assignment_content,
                    'assignment_budget' => $assignment_budget,
                    'assignment_is_active' => $assignment_is_active,
                    'assignment_instructions' => $assignment_instructions,
                );
                array_push($sub_data_array, $assignment_details);
            }
    
            else if($assignment_domain == "ED")
            {
                $get_assignment_sql = "SELECT * FROM `assignment_ed` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);
    
                $assignment_city = $get_assignment_row['city'];
                $assignment_copy = $get_assignment_row['copy'];
                $assignment_software = $get_assignment_row['software'];
                $assignment_type = $get_assignment_row['type'];
                $assignment_type = json_decode($assignment_type);
                $assignment_deadline = $get_assignment_row['deadline'];
                $assignment_submission_datetime = $get_assignment_row['submission_datetime'];
                $assignment_budget = $get_assignment_row['budget'];
                $assignment_instructions = $get_assignment_row['instructions'];
                $assignment_is_active = $get_assignment_row['is_active'];
    
                $assignment_details = array(
                    'check_assignment_type' => "ED",
                    'assignment_sql' => $get_assignment_sql,
                    'assignment_id' => $assignment_id,
                    'assignment_city' => $assignment_city,
                    'assignment_copy' => $assignment_copy,
                    'assignment_software' => $assignment_software,
                    'assignment_type' => $assignment_type,
                    'assignment_deadline' => $assignment_deadline,
                    'assignment_submission_datetime' => $assignment_submission_datetime,
                    'assignment_budget' => $assignment_budget,
                    'assignment_instructions' => $assignment_instructions,
                    'assignment_is_active' => $assignment_is_active,
                );
                array_push($sub_data_array, $assignment_details);
            }
    
            else if($assignment_domain == "Typing")
            {
                $get_assignment_sql = "SELECT * FROM `assignment_typing` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);
    
                $assignment_copy = $get_assignment_row['copy'];
                $assignment_city = $get_assignment_row['city'];
                $assignment_font = $get_assignment_row['font'];
                $assignment_font_size = $get_assignment_row['font_size'];   
                $assignment_font_color = $get_assignment_row['font_color'];
                $assignment_orientation = $get_assignment_row['orientation'];
                $assignment_page_size = $get_assignment_row['page_size'];
                $assignment_margins = $get_assignment_row['margins'];
                $assignment_number_of_pages = $get_assignment_row['number_of_pages'];
                $assignment_calculations = $get_assignment_row['calculations'];
                $assignment_budget = $get_assignment_row['budget'];
                $assignment_deadline_datetime = $get_assignment_row['deadline_datetime'];
                $assignment_date_of_submission = $get_assignment_row['date_of_submission'];
                $assignment_instructions = $get_assignment_row['instructions'];
                $assignment_is_active = $get_assignment_row['is_active'];
    
                $assignment_details = array(
                    'check_assignment_type' => "Typing",
                    'assignment_id' => $assignment_id,
                    'assignment_copy' => $assignment_copy,
                    'assignment_city' => $assignment_city,
                    'assignment_font' => $assignment_font,
                    'assignment_font_size' => $assignment_font_size,
                    'assignment_font_color' => $assignment_font_color,
                    'assignment_orientation' => $assignment_orientation,
                    'assignment_page_size' => $assignment_page_size,
                    'assignment_margins' => $assignment_margins,
                    'assignment_number_of_pages' => $assignment_number_of_pages,
                    'assignment_calculations' => $assignment_calculations,
                    'assignment_budget' => $assignment_budget,
                    'assignment_deadline_datetime' => $assignment_deadline_datetime,
                    'assignment_date_of_submission' => $assignment_date_of_submission,
                    'assignment_instructions' => $assignment_instructions,
                    'assignment_is_active' => $assignment_is_active,
                );
                array_push($sub_data_array, $assignment_details);
            }
    
            else if($assignment_domain == "Art")
            {
                $get_assignment_sql = "SELECT * FROM `assignment_art` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);
    
                $assignment_copy = $get_assignment_row['copy'];
                $assignment_city = $get_assignment_row['city'];
                $assignment_title = $get_assignment_row['title'];
                $assignment_project_category = $get_assignment_row['project_category'];
                $assignment_instructions = $get_assignment_row['instructions'];
                $assignment_budget = $get_assignment_row['budget'];
                $assignment_deadline = $get_assignment_row['deadline'];
                $assignment_date_of_submission = $get_assignment_row['date_of_submission'];
                $assignment_is_active = $get_assignment_row['is_active'];
    
                $assignment_details = array(
                    'check_assignment_type' => "Art",
                    'assignment_id' => $assignment_id,
                    'assignment_copy' => $assignment_copy,
                    'assignment_city' => $assignment_city,
                    'assignment_title' => $assignment_title,
                    'assignment_project_category' => $assignment_project_category,
                    'assignment_instructions' => $assignment_instructions,
                    'assignment_budget' => $assignment_budget,
                    'assignment_deadline' => $assignment_deadline,
                    'assignment_date_of_submission' => $assignment_date_of_submission,
                    'assignment_is_active' => $assignment_is_active,
                );
                array_push($sub_data_array, $assignment_details);
            }

            $marks_array = array(
                'total_marks_obtained' => $total_marks_obtained,
                'total_marks_out_of' => $total_marks_out_of,
                'total_marks_out_of_100' => $total_marks_out_of_100,
                'total_marks_category' => $total_marks_category,
                'total_resit' => $total_resit,
                'total_passing' => $total_passing,
                'total_merit' => $total_merit,
                'total_distinction' => $total_distinction,
            );

        }
            // return big array
        $student_data = array(
            'Heading' => "Personal Details",
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'college' => $college,
            'email' => $email,
            'email_verified' => $email_verified,
            'country_name' => $country_name,
            'country_code' => $country_code,
            'number' => $number,
            'number_verified' => $number_verified,
            'address' => $address,
            'university' => $university,
            'course' => $course,
            'affiliate_code' => $affiliate_code,
            'account_created_by' => $account_created_by,
            'wallet_coins' => $wallet,
            'is_select' => $is_select,
            'addition_date' => $addition_date,
            'expiry_date' => $expiry_date,
            'affiliate_users' => $affiliate_users,
            'chats' => $chats,
            'total_assignments_count' => $total_assignments_count,
            'total_freelancing_assignments_count' => $total_freelancing_assignments_count,
            'total_writing_assignments_count' => $total_writing_assignments_count,
            'total_ed_assignments_count' => $total_ed_assignments_count,
            'total_typing_assignments_count' => $total_typing_assignments_count,
            'total_art_assignments_count' => $total_art_assignments_count,
            'assignments_details' => $sub_data_array,
            'marks_array' => $marks_array,
        );

    array_push($map_array, $student_data);
    }

    // return big array
    echo json_encode($map_array);
