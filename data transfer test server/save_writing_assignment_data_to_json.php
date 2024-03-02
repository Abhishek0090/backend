<?php

    include_once 'old_connect.php';

    $assignment_data = array();

    $get_all_assignments_from_old_database = "SELECT * FROM `assignments`";
    $get_all_assignments_from_old_database_result = mysqli_query($old_conn, $get_all_assignments_from_old_database);


    while ($get_all_assignments_from_old_database_row = mysqli_fetch_array($get_all_assignments_from_old_database_result))
    {
        $assignment_array = array (
            'id' => $get_all_assignments_from_old_database_row['assign_id'],
            'user_id' => $get_all_assignments_from_old_database_row['user_id'],
            'file_name' => $get_all_assignments_from_old_database_row['assign_name'],
            'city' => $get_all_assignments_from_old_database_row['city'],
            'ink_color' => $get_all_assignments_from_old_database_row['ink_color'],
            'submission_datetime' => $get_all_assignments_from_old_database_row['submission_datetime'],
            'delivery_date' => $get_all_assignments_from_old_database_row['delivery_date'],
            'time' => $get_all_assignments_from_old_database_row['time'],
            'copy' => $get_all_assignments_from_old_database_row['copy'],
            'sheets' => $get_all_assignments_from_old_database_row['sheets'],
            'sides' => $get_all_assignments_from_old_database_row['sides'],
            'diagrams' => $get_all_assignments_from_old_database_row['diagrams'],
            'content' => $get_all_assignments_from_old_database_row['content'],
            'is_active' => $get_all_assignments_from_old_database_row['is_active'],
            'instructions' => $get_all_assignments_from_old_database_row['instructions'],
            'type' => $get_all_assignments_from_old_database_row['type'],
            'amount' => $get_all_assignments_from_old_database_row['amount'],
            'soa_assigned' => $get_all_assignments_from_old_database_row['soa_assigned'],
            'soa_written' => $get_all_assignments_from_old_database_row['soa_written'],
            'soa_paid' => $get_all_assignments_from_old_database_row['soa_paid'],
            'soa_completed' => $get_all_assignments_from_old_database_row['soa_completed'],
            'writing_manager' => $get_all_assignments_from_old_database_row['writingmanager'],
            'writer' => $get_all_assignments_from_old_database_row['writer'],
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

    $fp = fopen('writing_assignment_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($assignment_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>