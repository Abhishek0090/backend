<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $submit = $data['submit'];

    if ($submit == "submit")
    {
        date_default_timezone_set('Asia/Kolkata');

        // $data = file_get_contents("php://input");

        $token = $data['token'];
        $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
        $user_id = $jwt['id'];

        $domain = $data['domain'];
        $copy = $data['copy'];
        $city = $data['city'];
        $name_of_software = $data['name_of_software'];

        $type_of_drawing = $data['type_of_drawing'];
        $type_of_drawing = json_encode($type_of_drawing);

        $instructions = $data['instructions'];
        $budget = $data['budget'];
        $deadline = $data['deadline'];
        
        $assignment_files_received_random_number = $data['assignment_files_random_number'];
        $assignment_files_string = $data['assignment_files'];

        $now = date("d-m-Y H:i:s");

        // enter above details in `assignment` table
        // fetch the id of the assignment
        // enter respective if condition
        // get other details of assignment
        // if freelance assignment then enter details in `assignmentfreelance` table
        // if copy paste assignment then enter details in `assignmentcopypaste` table
        // return single array with all details

        if($domain == "ED")
        {
            $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$user_id', '$domain')";
            $insert_into_map_result = mysqli_query($conn, $insert_into_map);

            $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$user_id' AND `domain` = '$domain' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_id_result = mysqli_query($conn, $get_assignment_id);
            $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            $assignment_id = $get_assignment_id_row['id'];

            $assignment_files = explode('_$_', $assignment_files_string);
            $number_of_files = count($assignment_files);
            if($number_of_files == 2)
            {
                rename("../../files/uploads/assignments/ed/".$assignment_files[0], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[0]);
            }
            elseif($number_of_files == 3)
            {
                rename("../../files/uploads/assignments/ed/".$assignment_files[0], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[0]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[1], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[1]);
            }
            elseif($number_of_files == 4)
            {
                rename("../../files/uploads/assignments/ed/".$assignment_files[0], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[0]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[1], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[1]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[2], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[2]);
            }
            elseif($number_of_files == 5)
            {
                rename("../../files/uploads/assignments/ed/".$assignment_files[0], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[0]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[1], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[1]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[2], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[2]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[3], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[3]);
            }
            elseif($number_of_files == 6)
            {
                rename("../../files/uploads/assignments/ed/".$assignment_files[0], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[0]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[1], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[1]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[2], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[2]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[3], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[3]);
                rename("../../files/uploads/assignments/ed/".$assignment_files[4], "../../files/assignments/ed/".$assignment_id."_".$assignment_files[4]);
            }

            $insert_assignment_sql = "INSERT INTO `assignment_ed` (`assignment_id`, `city`, `copy`, `software`, `type`, `deadline`, `submission_datetime`, `budget`, `instructions`, `is_active`, `file`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) 
            VALUES ('$assignment_id', '$city', '$copy', '$name_of_software', '$type_of_drawing', '$deadline', '$now', '$budget', '$instructions', '1', '$assignment_files_string',  1, 0, 0, 0, 0, 0, 0)";
            $insert_assignment_result = mysqli_query($conn, $insert_assignment_sql);

            if($insert_into_map == true && $insert_assignment_sql == true)
            {
                $dummy_array = array(
                    'id' => $assignment_id,
                    'user_id' => $user_id,
                    // 'domain' => $domain,
                    // 'stream' => $stream,
                    // 'title' => $title,
                    // 'description' => $description,
                    // 'course' => $course,
                    // 'level' => $level,
                    // 'type' => $type,
                    // 'subject_tags' => $subject_tags,
                    // 'deadline' => $deadline,
                    // 'budget' => $budget,
                    // 'file' => $assignment_files_string,
                    // 'submission_date' => $now,
                    'sql' => $insert_assignment_sql
                );
            }
            else
            {
                $dummy_array = array(
                    "message" => "Assignment posting failed",
                );
            }
            

            // echo json_encode($dummy_array);
        }
        else
        {
            $dummy_array = array(
                'message' => "Not ED"
            );
        }
    }

    else
    {
        $dummy_array = array(
            'message' => "Not Submitted"
        );
    }
    
    echo json_encode($dummy_array);

?>