<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $assignment_id = $_GET['id'];

    $map_array = array();

    $check_assignment_map_sql = "SELECT * FROM `brainheaters` WHERE `id` = '$assignment_id'";
    $check_assignment_map_result = mysqli_query($conn, $check_assignment_map_sql);
    $check_assignment_map_data = mysqli_fetch_assoc($check_assignment_map_result);
    $check_assignment_map_count = mysqli_num_rows($check_assignment_map_result);

    // echo json_encode($check_assignment_map_data);

    if($check_assignment_map_count == 0)
    {
        echo json_encode("No assignment found");
        exit();
    }
    else
    {
        $name = $check_assignment_map_data['name'];
        $number = $check_assignment_map_data['number'];
        $college_name = $check_assignment_map_data['college_name'];
        $course = $check_assignment_map_data['course'];
        $title = $check_assignment_map_data['title'];
        $description = $check_assignment_map_data['description'];
        $date_of_submission = $check_assignment_map_data['date_of_submission'];
        $budget = $check_assignment_map_data['budget'];
        $files = $check_assignment_map_data['files'];
        $deadline = $check_assignment_map_data['deadline'];
        $bh_posted = $check_assignment_map_data['bh_posted'];
        $bh_likely = $check_assignment_map_data['bh_likely'];
        $bh_converted = $check_assignment_map_data['bh_converted'];
        $bh_completed = $check_assignment_map_data['bh_completed'];
        $bh_lost = $check_assignment_map_data['bh_lost'];
        $lost_reason = $check_assignment_map_data['lost_reason'];
        
        $last_assignment_id_sql = "SELECT `id` FROM `brainheaters` ORDER BY `id` DESC LIMIT 1";
        $last_assignment_id_result = mysqli_query($conn, $last_assignment_id_sql);
        $last_assignment_id_data = mysqli_fetch_assoc($last_assignment_id_result);
        $last_assignment_id = $last_assignment_id_data['assignment_id'];

        $first_assignment_id_sql = "SELECT `id` FROM `brainheaters` ORDER BY `id` ASC LIMIT 1";
        $first_assignment_id_result = mysqli_query($conn, $first_assignment_id_sql);
        $first_assignment_id_data = mysqli_fetch_assoc($first_assignment_id_result);
        $first_assignment_id = $first_assignment_id_data['assignment_id'];
        
        $next_assignment_sql = "SELECT * FROM brainheaters WHERE id = (SELECT MIN(id) FROM brainheaters WHERE id > '$assignment_id')";
        $next_id_result = mysqli_query($conn, $next_assignment_sql);
        $next_id_data = mysqli_fetch_assoc($next_id_result);
        $next_assignment_id = $next_id_data['id'];

        $previous_assignment_sql = "SELECT * FROM brainheaters WHERE id = (SELECT MAX(id) FROM brainheaters WHERE id < '$assignment_id')";
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

        $assignment_details = array(
            'assignment_id' => $assignment_id,
            'name' => $name,
            'number' => $number,
            'college_name' => $college_name,
            'course' => $course,
            'title' => $title,
            'description' => $description,
            'date_of_submission' => $date_of_submission,
            'budget' => $budget,
            'files' => $files,
            'deadline' => $deadline,
            'bh_posted' => $bh_posted,
            'bh_likely' => $bh_likely,
            'bh_converted' => $bh_converted,
            'bh_completed' => $bh_completed,
            'bh_lost' => $bh_lost,
            'lost_reason' => $lost_reason,
            'next_assignment_id' => $next_assignment_id,
            'previous_assignment_id' => $previous_assignment_id,
            "last_assignment_id_sql" => $last_assignment_id_sql,
        );

        array_push($map_array, $assignment_details);
    }

    echo json_encode($map_array);    
?>