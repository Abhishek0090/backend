<?php

    include_once 'old_connect.php';

    $assignment_data = array();

    $get_all_assignments_from_old_database = "SELECT * FROM `assignment`";
    $get_all_assignments_from_old_database_result = mysqli_query($old_conn, $get_all_assignments_from_old_database);


    while ($get_all_assignments_from_old_database_row = mysqli_fetch_array($get_all_assignments_from_old_database_result))
    {
        $assignment_array = array (
            'id' => $get_all_assignments_from_old_database_row['id'],
            'user_id' => $get_all_assignments_from_old_database_row['user_id'],
            'title' => $get_all_assignments_from_old_database_row['title'],
            'description' => $get_all_assignments_from_old_database_row['description'],
            'stream' => $get_all_assignments_from_old_database_row['stream'],
            'course' => $get_all_assignments_from_old_database_row['course'],
            'assignment_type' => $get_all_assignments_from_old_database_row['assignment type'],
            'assignment_level' => $get_all_assignments_from_old_database_row['assignment_level'],
            'subject_tags' => $get_all_assignments_from_old_database_row['subject_tags'],
            'deadline' => $get_all_assignments_from_old_database_row['deadline'],
            'time' => $get_all_assignments_from_old_database_row['time'],
            'date_of_submission' => $get_all_assignments_from_old_database_row['date_of_submission'],
            'budget' => $get_all_assignments_from_old_database_row['budget'],
            'filename' => $get_all_assignments_from_old_database_row['filename'],
            'project_manager' => $get_all_assignments_from_old_database_row['project_manager'],
            'freelancer' => $get_all_assignments_from_old_database_row['freelancer'],
            'posted' => $get_all_assignments_from_old_database_row['posted'],
            'under_process' => $get_all_assignments_from_old_database_row['under_process'],
            'assigned_to_pm' => $get_all_assignments_from_old_database_row['assigned_to_pm'],
            'assigned_to_freelancer' => $get_all_assignments_from_old_database_row['assigned_to_freelancer'],
            'confirmed' => $get_all_assignments_from_old_database_row['confirmed'],
            'review_recieved' => $get_all_assignments_from_old_database_row['review_recieved'],
            'lost' => $get_all_assignments_from_old_database_row['lost'],
        );

        array_push($assignment_data, $assignment_array);
    }

    $fp = fopen('assignment_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($assignment_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>