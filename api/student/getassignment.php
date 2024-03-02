<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $token = $data['token'];
    $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
    $user_id = $jwt['id'];

    // sql query to select * where user_id = $user_id ORDER BY id DESC
    // fetch all data of assignments
    // create empty array
    // enter array of 1 assignment in the empty array
    // append the array with assignment details array
    // loop till last assignment
    // return the array

    $map_array = array();

    $get_assignment_map_sql = "SELECT * FROM `assignment_map` WHERE `user_id` = '$user_id' AND (`domain` = 'Freelancer' OR `domain` = 'Programming' OR `domain` = 'Freelancer Programming' OR `domain` = 'Professional Writing' OR `domain` = 'Freelancer Professional Writing' OR `domain` = 'Academic Writing' OR `domain` = 'Freelancer Academic Writing') ORDER BY `id` DESC";
    $get_assignment_map_result = mysqli_query($conn, $get_assignment_map_sql);

    while($get_assignment_map_row = mysqli_fetch_array($get_assignment_map_result))
    {
        $assignment_id = $get_assignment_map_row['id'];
        $assignment_domain = $get_assignment_map_row['domain'];

        if($assignment_domain == "Freelancer" 
            || $assignment_domain == "Programming" || $assignment_domain = "Freelancer Programming"
            || $assignment_domain = "Professional Writing" || $assignment_domain = "Freelancer Professional Writing"
            || $assignment_domain = "Academic Writing"  || $assignment_domain = "Freelancer Academic Writing"
        )
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

            $assignment_details = array(
                'check_assignment_type' => "Freelancer",
                // 'get_assignment_sql' => $get_assignment_sql,
                // 'map_sql' => $get_assignment_map_sql,
                'assignment_id' => $assignment_id,
                'assignment_domain' => $assignment_domain,
                'assignment_stream' => $assignment_stream,
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
            );

            array_push($map_array, $assignment_details);
        }

    }
    
    echo json_encode($map_array);

?>