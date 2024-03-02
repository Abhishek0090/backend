<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $assignment_id = $_GET['assignment_id'];

    $get_assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = $assignment_id";
    $get_assignment_data_result = mysqli_query($conn, $get_assignment_data_sql);
    $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_result);

    $assignment_stream = $get_assignment_data_row['stream'];
    $assignment_title = $get_assignment_data_row['title'];
    $assignment_description = $get_assignment_data_row['description'];
    $assignment_course = $get_assignment_data_row['course'];
    $assignment_level = $get_assignment_data_row['level'];
    
    $assignment_type = $get_assignment_data_row['type'];
    $assignment_type = json_decode($assignment_type);

    $assignment_subject_tags = $get_assignment_data_row['subject_tags'];
    $assignment_subject_tags = json_decode($assignment_subject_tags);
    
    $assignment_deadline = $get_assignment_data_row['deadline'];
    $assignment_files = $get_assignment_data_row['files'];
    $assignment_project_manager = $get_assignment_data_row['project_manager'];

    if($assignment_project_manager != NULL)
    {
        $get_project_manager_details_sql = "SELECT * FROM `team` WHERE `id` = $assignment_project_manager";
        $get_project_manager_details_result = mysqli_query($conn, $get_project_manager_details_sql);
        $get_project_manager_details_row = mysqli_fetch_array($get_project_manager_details_result);

        $project_manager_name = $get_project_manager_details_row['name'];
        $project_manager_email = $get_project_manager_details_row['email_old'];
        $project_manager_number = $get_project_manager_details_row['number'];
        $project_manager_number_whatsapp = $get_project_manager_details_row['number_whatsapp'];

        $project_manager_array = array(
            'name' => $project_manager_name,
            'email' => $project_manager_email,
            'number' => $project_manager_number,
            'number_whatsapp' => $project_manager_number_whatsapp,
        );
    }

    echo json_encode(array(
        'stream' => $assignment_stream,
        'title' => $assignment_title,
        'description' => $assignment_description,
        'course' => $assignment_course,
        'level' => $assignment_level,
        'type' => $assignment_type,
        'subject_tags' => $assignment_subject_tags,
        'deadline' => $assignment_deadline,
        // 'files' => $assignment_files,
        'project_manager' => $assignment_project_manager,
        'project_manager_details' => $project_manager_array,
    ));

?>