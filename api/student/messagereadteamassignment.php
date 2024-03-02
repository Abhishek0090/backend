<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $message_id = $data['message_id'];
    $student_id = $data['student_id'];

    // if read is empty then make an empty array to store all jsons of read data
        // make json of read data
        // push new json in array
        // update read_on with new array
    // else
        // decode read_on
        // make json of read data
        // push new json in array
        // update read_on with new array

    $get_student_details_sql = "SELECT * FROM `users` WHERE `id` = '$student_id'";
    $get_student_details = mysqli_query($conn, $get_student_details_sql);
    $get_student_details_row = mysqli_fetch_assoc($get_student_details);
    $firstname = $get_student_details_row['firstname'];
    $lastname = $get_student_details_row['lastname'];
    $name = $firstname . " " . $lastname;
    $role = "Student";

    $message_details_sql = "SELECT * FROM `team_and_student_chat_assignment` WHERE `id` = '$message_id'";
    $message_details = mysqli_query($conn, $message_details_sql);
    $message_details_row = mysqli_fetch_assoc($message_details);
    $read_on = $message_details_row['read_on'];

    if($read_on == null)
    {
        $read_data = array();
        
        $read_json = array(
            "read_on" => $now,
            "read_to" => $student_id,
            "read_to_type" => "Student",
            "read_to_name" => $name,
            "read_role" => $role,
        );

        array_push($read_data, $read_json);
        
        $read_json = json_encode($read_data);
        
        $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message read";
        }
    }

    else
    {
        $read_array = array();
        
        $read_data = json_decode($read_on);

        foreach($read_data as $read)
        {
            array_push($read_array, $read->read_to);
        }
        $index_array = array_values(array_unique($read_array));
        
        if(!in_array($student_id, $index_array))
        {
            $read_data = json_decode($read_on);
            $read_json = array(
                "read_on" => $now,
                "read_to" => $student_id,
                "read_to_name" => $name,
                "read_role" => $role,
            );

            array_push($read_data, $read_json);
            $read_json = json_encode($read_data);

            $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
            $update_message_data = mysqli_query($conn, $update_message_data_sql);
            if($update_message_data == true)
            {
                $status = "Message read";
            }
        }
        // $read_data = json_decode($read_on, true);
        
        // $read_json = array(
        //     "read_on" => $now,
        //     "read_to" => $student_id
        // );

        // array_push($read_data, $read_json);
        
        // $read_json = json_encode($read_data);
        
        // $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
        // $update_message_data = mysqli_query($conn, $update_message_data_sql);
        // if($update_message_data == true)
        // {
        //     $status = "Message read";
        // }
    }
    
    echo json_encode(array(
        "status" => $status,
    ));

?>