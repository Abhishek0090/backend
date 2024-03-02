<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $assignment_id = $_GET['assignment_id'];

    $assignment_array = array();

    $get_map_details_sql = "SELECT * FROM `assignment_map` WHERE `id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
    $get_map_details_result = mysqli_query($conn, $get_map_details_sql);
    $get_map_details_num = mysqli_num_rows($get_map_details_result);
    $get_map_details_row = mysqli_fetch_assoc($get_map_details_result);

    if($get_map_details_num == 0)
    {
        echo json_encode(array(
            'message' => "No such assignment found"
        ));
        exit();
    }

    $user_id = $get_map_details_row['user_id'];
    $domain = $get_map_details_row['domain'];

    $assignment_map_array = array(
        'array' => "Map Array",
        'user_id' => $user_id,
        'domain' => $domain
    );

    array_push($assignment_array, $assignment_map_array);

    $get_assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
    $get_assignment_details_result = mysqli_query($conn, $get_assignment_details_sql);
    // $get_assignment_details_num = mysqli_num_rows($get_assignment_details_result);
    $get_assignment_details_row = mysqli_fetch_assoc($get_assignment_details_result);

    $id = $get_assignment_details_row['id'];
    $title = $get_assignment_details_row['title'];
    $description = $get_assignment_details_row['description'];
    $course = $get_assignment_details_row['course'];
    $level = $get_assignment_details_row['level'];
    $type = $get_assignment_details_row['type'];
    $subject_tags = $get_assignment_details_row['subject_tags'];
    $deadline = $get_assignment_details_row['deadline'];
    $budget = $get_assignment_details_row['budget'];
    $files = $get_assignment_details_row['files'];
    $submission_date = $get_assignment_details_row['submission_date'];
    $project_manager = $get_assignment_details_row['project_manager'];
    $freelancer = $get_assignment_details_row['freelancer'];
    $posted = $get_assignment_details_row['posted'];
    $under_process = $get_assignment_details_row['under_process'];
    $assigned_to_pm = $get_assignment_details_row['assigned_to_pm'];
    $assigned_to_freelancer = $get_assignment_details_row['assigned_to_freelancer'];
    $completed = $get_assignment_details_row['completed'];
    $review_recieved = $get_assignment_details_row['review_recieved'];
    $lost = $get_assignment_details_row['lost'];
    $resit = $get_assignment_details_row['resit'];

    $assignment_details_array = array(
        'array' => "Assignment Array",
        'id' => $id,
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
        'project_manager' => $project_manager,
        'freelancer' => $freelancer,
        'posted' => $posted,
        'under_process' => $under_process,
        'assigned_to_pm' => $assigned_to_pm,
        'assigned_to_freelancer' => $assigned_to_freelancer,
        'completed' => $completed,
        'review_recieved' => $review_recieved,
        'lost' => $lost,
        'resit' => $resit
    );

    array_push($assignment_array, $assignment_details_array);

    $assignment_array = json_encode($assignment_array);
    $assignment_array = str_replace("'", " \' ", $assignment_array);

    $assignment_map_array = json_encode($assignment_map_array);
    $assignment_map_array = str_replace("'", " \' ", $assignment_map_array);

    $assignment_details_array = json_encode($assignment_details_array);
    $assignment_details_array = str_replace("'", " \' ", $assignment_details_array);

    $insert_into_dump = "INSERT INTO `dump_assignment`(`assignment_id`, `map_array`, `details_array`, `assignment_array`) VALUES ('$assignment_id', '$assignment_map_array', '$assignment_details_array', '$assignment_array')";
    $insert_into_dump_result = mysqli_query($conn, $insert_into_dump);

    $delete_assignment_map_sql = "DELETE FROM `assignment_map` WHERE `id` = '$assignment_id'";
    $delete_assignment_map_result = mysqli_query($conn, $delete_assignment_map_sql);

    $delete_assignment_details_sql = "DELETE FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
    $delete_assignment_details_result = mysqli_query($conn, $delete_assignment_details_sql);

    echo json_encode(array(
        'status' => 200,
        'message' => "Assignment Deleted",
        'assignment_id' => $assignment_id,
        // 'assignment_array' => $assignment_array,
        // 'assignment_map_array' => $assignment_map_array,
        // 'assignment_details_array' => $assignment_details_array,
        // 'insert_into_dump' => $insert_into_dump,
        // 'insert_into_dump_result' => $insert_into_dump_result
    ));

?>