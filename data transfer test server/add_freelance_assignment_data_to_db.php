<?php

    include_once 'new_connect.php';

    $filename = 'assignment_data.json';
    if(file_exists($filename))
    {
        // var_dump("File exists");

        $data = file_get_contents($filename);
        // var_dump($data);
        
        $data = json_decode($data, true);
        // var_dump($data);
        
        $number_of_arrays = count($data);
        
        for($i = 0; $i < $number_of_arrays; $i++)
        {
            var_dump($i);

            $old_assignment_id = $data[$i]['id'];
            $old_assignment_user_id = $data[$i]['user_id'];
            $old_assignment_title = $data[$i]['title'];
            $old_assignment_description = $data[$i]['description'];
            $old_assignment_stream = $data[$i]['stream'];
            $old_assignment_course = $data[$i]['course'];
            $old_assignment_assignment_type = $data[$i]['assignment_type'];
            $old_assignment_assignment_level = $data[$i]['assignment_level'];
            $old_assignment_subject_tags = $data[$i]['subject_tags'];
            $old_assignment_deadline = $data[$i]['deadline'];
            $old_assignment_time = $data[$i]['time'];
            $old_assignment_date_of_submission = $data[$i]['date_of_submission'];
            $old_assignment_budget = $data[$i]['budget'];
            $old_assignment_filename = $data[$i]['filename'];
            $old_assignment_project_manager = $data[$i]['project_manager'];
            $old_assignment_freelancer = $data[$i]['freelancer'];
            $old_assignment_posted = $data[$i]['posted'];
            $old_assignment_under_process = $data[$i]['under_process'];
            $old_assignment_assigned_to_pm = $data[$i]['assigned_to_pm'];
            $old_assignment_assigned_to_freelancer = $data[$i]['assigned_to_freelancer'];
            $old_assignment_confirmed = $data[$i]['confirmed'];
            $old_assignment_review_recieved = $data[$i]['review_recieved'];
            $old_assignment_lost = $data[$i]['lost'];

            // echo "Assignment Details";
            // echo "<br>";
            // echo $old_assignment_id;
            // echo "<br>";
            // echo $old_assignment_user_id;
            // echo "<br>";
            // echo $old_assignment_title;
            // echo "<br>";
            // echo $old_assignment_description;
            // echo "<br>";
            // echo $old_assignment_stream;
            // echo "<br>";
            // echo $old_assignment_course;
            // echo "<br>";
            // echo $old_assignment_assignment_type;
            // echo "<br>";
            // echo $old_assignment_assignment_level;
            // echo "<br>";
            // echo $old_assignment_subject_tags;
            // echo "<br>";
            // echo $old_assignment_deadline;
            // echo "<br>";
            // echo $old_assignment_time;
            // echo "<br>";
            // echo $old_assignment_date_of_submission;
            // echo "<br>";
            // echo $old_assignment_budget;
            // echo "<br>";
            // echo $old_assignment_filename;
            // echo "<br>";
            // echo $old_assignment_project_manager;
            // echo "<br>";
            // echo $old_assignment_freelancer;
            // echo "<br>";
            // echo $old_assignment_posted;
            // echo "<br>";
            // echo $old_assignment_under_process;
            // echo "<br>";
            // echo $old_assignment_assigned_to_pm;
            // echo "<br>";
            // echo $old_assignment_assigned_to_freelancer;
            // echo "<br>";
            // echo $old_assignment_confirmed;
            // echo "<br>";
            // echo $old_assignment_review_recieved;
            // echo "<br>";
            // echo $old_assignment_lost;
            // echo "<br>";
            // echo "<br>";
            // echo "--------------------------------------------------------------------------------------------------";
            // echo "<br>";
            // echo "<br>";

            $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$old_assignment_user_id', 'Freelancer')";
            // var_dump($insert_into_map);
            $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);

            $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$old_assignment_user_id' AND `domain` = 'Freelancer' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_id_result = mysqli_query($new_conn, $get_assignment_id);
            $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            $assignment_id = $get_assignment_id_row['id'];

            $assignment_id = $i;
            switch($old_assignment_stream)
            {
                case 0:
                    $stream = "Engineering";
                    break;
                case 1:
                    $stream = "Medical";
                    break;
                case 2:
                    $stream = "Commerce";
                    break;
                case 3:
                    $stream = "Arts";
                    break;
            }

            $title = $old_assignment_title;
            $description = $old_assignment_description;
            $course = $old_assignment_course;
            $level = $old_assignment_assignment_level;
            $type = $old_assignment_assignment_type;
            $subject_tags = $old_assignment_subject_tags;
            $deadline = $old_assignment_deadline. " " . $old_assignment_time;
            $budget = $old_assignment_budget;
            $file = $old_assignment_filename;
            date_default_timezone_set('Asia/Kolkata');
            $now = date("Y-m-d H:i:s");
            $posted = $old_assignment_posted;
            $under_process = $old_assignment_under_process;
            $assigned_to_pm = $old_assignment_assigned_to_pm;
            $assigned_to_freelancer = $old_assignment_assigned_to_freelancer;
            $completed = $old_assignment_confirmed;
            $review_received = $old_assignment_review_recieved;
            $lost = $old_assignment_lost;

            
            $insert_assignment_sql = "INSERT INTO `assignment_freelance` (`assignment_id`, `stream`, `title`, `description`, `course`, `level`, `type`, `subject_tags`, `deadline`, `budget`, `files`, `submission_date`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `completed`, `review_recieved`, `lost`) 
            VALUES ('$assignment_id', '$stream', '$title', '$description', '$course', '$level', '$type', '$subject_tags', '$deadline', '$budget', '$file', '$now', '$posted', '$under_process', '$assigned_to_pm', '$assigned_to_freelancer', '$completed', '$review_received', '$lost')";
            // echo $insert_assignment_sql;
            // echo "<br>";
            $insert_assignment_result = mysqli_query($new_conn, $insert_assignment_sql);
            echo $insert_assignment_result;
            echo "<br>";
        }
    }

    else
    {
        var_dump("File does not exist");
    }

?>