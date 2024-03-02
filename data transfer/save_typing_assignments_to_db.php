<?php

    include_once 'old_connect.php';

    $assignment_data = array();

    $get_all_assignments_from_old_database = "SELECT * FROM `assignmentstyping`";
    $get_all_assignments_from_old_database_result = mysqli_query($old_conn, $get_all_assignments_from_old_database);


    while ($get_all_assignments_from_old_database_row = mysqli_fetch_array($get_all_assignments_from_old_database_result))
    {
        $assignment_array = array (
            'id' => $get_all_assignments_from_old_database_row['id'],
            'user_id' => $get_all_assignments_from_old_database_row['user_id'],
            'city' => $get_all_assignments_from_old_database_row['city'],
            'font' => $get_all_assignments_from_old_database_row['font'],
            'font_size' => $get_all_assignments_from_old_database_row['font_size'],
            'font_color' => $get_all_assignments_from_old_database_row['font_color'],
            'orientation' => $get_all_assignments_from_old_database_row['orientation'],
            'page_size' => $get_all_assignments_from_old_database_row['page_size'],
            'margins' => $get_all_assignments_from_old_database_row['margins'],
            'number_of_pages' => $get_all_assignments_from_old_database_row['number'],
            'calculations' => $get_all_assignments_from_old_database_row['calculations'],
            'deadline' => $get_all_assignments_from_old_database_row['deadline'],
            'time' => $get_all_assignments_from_old_database_row['time'],
            'date_of_submission' => $get_all_assignments_from_old_database_row['date_of_submission'],
            'instructions' => $get_all_assignments_from_old_database_row['instructions'],
            'is_active' => $get_all_assignments_from_old_database_row['is_active'],
            'file' => $get_all_assignments_from_old_database_row['file'],
            'writing_manager' => $get_all_assignments_from_old_database_row['project_manager'],
            'writer' => $get_all_assignments_from_old_database_row['freelancer'],
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

    $fp = fopen('typing_assignment_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($assignment_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>