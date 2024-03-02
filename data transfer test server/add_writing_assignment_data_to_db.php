<?php

    include_once 'new_connect.php';

    $filename = 'writing_assignment_data.json';
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
            $old_assignment_file_name = $data[$i]['file_name'];
            $old_assignment_city = $data[$i]['city'];
            $old_assignment_ink_color = $data[$i]['ink_color'];
            $old_assignment_submission_datetime = $data[$i]['submission_datetime'];
            $old_assignment_delivery_date = $data[$i]['delivery_date'];
            $old_assignment_time = $data[$i]['time'];
            $old_assignment_copy = $data[$i]['copy'];
            $old_assignment_sheets = $data[$i]['sheets'];
            $old_assignment_sides = $data[$i]['sides'];
            $old_assignment_diagrams = $data[$i]['diagrams'];
            $old_assignments_content = $data[$i]['content'];
            $old_assignment_is_active = $data[$i]['is_active'];
            $old_assignment_instructions = $data[$i]['instructions'];
            $old_assignment_type = $data[$i]['type'];
            $old_assignment_amount = $data[$i]['amount'];
            $old_assignment_soa_assigned = $data[$i]['soa_assigned'];
            $old_assignment_soa_written = $data[$i]['soa_written'];
            $old_assignment_soa_paid = $data[$i]['soa_paid'];
            $old_assignment_soa_completed = $data[$i]['soa_completed'];
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

            $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$old_assignment_user_id', 'Writing')";
            var_dump($insert_into_map);
            $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);

            $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$old_assignment_user_id' AND `domain` = 'Writing' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_id_result = mysqli_query($new_conn, $get_assignment_id);
            $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            $assignment_id = $get_assignment_id_row['id'];

            $file_name = $old_assignment_file_name;
            $city = $old_assignment_city;
            $ink_color = $old_assignment_ink_color;
            $submission_datetime = $old_assignment_submission_datetime;
            $delivery_datetime = $old_assignment_delivery_date . " " . $old_assignment_time;
            $copy = $old_assignment_copy;
            $sheets = $old_assignment_sheets;
            $sides = $old_assignment_sides;
            $diagrams = $old_assignment_diagrams;
            $content = $old_assignments_content;
            $is_active = $old_assignment_is_active;
            $instructions = $old_assignment_instructions;
            $posted = $old_assignment_posted;
            $under_process = $old_assignment_under_process;
            $assigned_to_wm = $old_assignment_assigned_to_pm;
            $assigned_to_writer = $old_assignment_assigned_to_freelancer;
            $completed = $old_assignment_confirmed;
            $review_received = $old_assignment_review_recieved;
            $lost = $old_assignment_lost;

            
            // date_default_timezone_set('Asia/Kolkata');
            // $now = date("Y-m-d H:i:s");
            
            
            $insert_assignment_sql = "INSERT INTO `assignment_writing` (`assignment_id`, `file_name`, `city`, `ink_color`, `submission_datetime`, `delivery_datetime`, `copy`, `sheets`, `sides`, `diagrams`, `content`, `is_active`, `instructions`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) 
            VALUES ('$assignment_id', '$file_name', '$city', '$ink_color', '$submission_datetime', '$delivery_datetime', '$copy', '$sheets', '$sides', '$diagrams', '$content', '$is_active', '$instructions', '$posted', '$under_process', '$assigned_to_wm', '$assigned_to_writer', '$completed', '$review_received', '$lost')";
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