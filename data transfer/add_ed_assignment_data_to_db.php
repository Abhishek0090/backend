<?php

    include_once 'new_connect.php';

    $filename = 'ed_assignment_data.json';
    if(file_exists($filename))
    {
        $data = file_get_contents($filename);
        
        $data = json_decode($data, true);
        
        $number_of_arrays = count($data);
        
        for($i = 0; $i < $number_of_arrays; $i++)
        {
            var_dump($i);

            $old_assignment_id = $data[$i]['id'];
            $old_assignment_user_id = $data[$i]['user_id'];
            $old_assignment_city = $data[$i]['city'];
            $old_assignment_copy = $data[$i]['copy'];
            $old_assignment_software = $data[$i]['software'];
            $old_assignment_type = $data[$i]['type'];
            $old_assignment_deadline = $data[$i]['deadline'];
            $old_assignment_time = $data[$i]['time'];
            $old_assignment_date_of_submission = $data[$i]['date_of_submission'];
            $old_assignment_instructions = $data[$i]['instructions'];
            $old_assignment_is_active = $data[$i]['is_active'];
            $old_assignment_file = $data[$i]['file'];
            $old_assignment_type = $data[$i]['type'];
            $old_assignment_writing_manager = $data[$i]['writing_manager'];
            $old_assignment_writer = $data[$i]['writer'];
            $old_assignment_posted = $data[$i]['posted'];
            $old_assignment_under_process = $data[$i]['under_process'];
            $old_assignment_assigned_to_pm = $data[$i]['assigned_to_pm'];
            $old_assignment_assigned_to_freelancer = $data[$i]['assigned_to_freelancer'];
            $old_assignment_confirmed = $data[$i]['confirmed'];
            $old_assignment_review_recieved = $data[$i]['review_recieved'];
            $old_assignment_lost = $data[$i]['lost'];

            echo "Assignment Details";
            echo "<br>";
            echo $old_assignment_id;
            echo "<br>";
            echo $old_assignment_user_id;
            // echo "<br>";
            // echo "<br>";
            // echo "--------------------------------------------------------------------------------------------------";
            // echo "<br>";
            // echo "<br>";

            $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$old_assignment_user_id', 'Technical Drawing')";
            var_dump($insert_into_map);
            $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);
            echo "<br>";
            echo $insert_into_map_result;
            echo "<br>";

            $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$old_assignment_user_id' AND `domain` = 'Technical Drawing' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_id_result = mysqli_query($new_conn, $get_assignment_id);
            $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            $assignment_id = $get_assignment_id_row['id'];
            
            $city = $old_assignment_city;
            $copy = $old_assignment_copy;
            $software = $old_assignment_software;
            $type = $old_assignment_type;
            $submission_datetime = $old_assignment_date_of_submission;
            $delivery_datetime = $old_assignment_deadline . " " . $old_assignment_time;
            $instructions = $old_assignment_instructions;
            $is_active = $old_assignment_is_active;
            $file_name = $old_assignment_file;
            $posted = $old_assignment_posted;
            $under_process = $old_assignment_under_process;
            $assigned_to_wm = $old_assignment_assigned_to_pm;
            $assigned_to_writer = $old_assignment_assigned_to_freelancer;
            $completed = $old_assignment_confirmed;
            $review_received = $old_assignment_review_recieved;
            $lost = $old_assignment_lost;

            
            // date_default_timezone_set('Asia/Kolkata');
            // $now = date("Y-m-d H:i:s");
            
            
            $insert_assignment_sql = "INSERT INTO `assignment_ed` (`assignment_id`, `city`, `copy`, `software`, `type`, `deadline`, `submission_datetime`, `instructions`, `is_active`, `file`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) 
            VALUES ('$assignment_id', '$city', '$copy', '$software', '$type', '$delivery_datetime', '$submission_datetime', '$instructions', '$is_active', '$file_name', '$posted', '$under_process', '$assigned_to_wm', '$assigned_to_writer', '$completed', '$review_received', '$lost')";
            echo $insert_assignment_sql;
            echo "<br>";
            $insert_assignment_result = mysqli_query($new_conn, $insert_assignment_sql);
            echo $insert_assignment_result;
            // echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "--------------------------------------------------------------------------------------------------";
            echo "<br>";
            echo "<br>";
        }
    }

    else
    {
        var_dump("File does not exist");
    }

?>