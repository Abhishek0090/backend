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

    // if delivered is empty then make an empty array to store all jsons of delivered data
        // make json of delivered data
        // push new json in array
        // update delivered_on with new array
    // else
        // decode delivered_on
        // make json of delivered data
        // push new json in array
        // update delivered_on with new array

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
    $delivered_on = $message_details_row['delivered_on'];

    if($delivered_on == null)
    {
        $delivered_data = array();
        
        $delivered_json = array(
            "delivered_on" => $now,
            "delivered_to" => $student_id,
            "delivered_to_type" => "Student",
            "delivered_to_name" => $name,
            "delivered_to_role" => $role,
        );

        array_push($delivered_data, $delivered_json);
        
        $delivered_json = json_encode($delivered_data);
        
        $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message Delivered";
        }
    }

    else
    {
        $delivered_data = json_decode($delivered_on, true);
        
        $delivered_json = array(
            "delivered_on" => $now,
            "delivered_to" => $student_id
        );

        array_push($delivered_data, $delivered_json);
        
        $delivered_json = json_encode($delivered_data);
        
        $update_message_data_sql = "UPDATE `team_and_student_chat_assignment` SET `delivered_on` = '$delivered_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message Delivered";
        }
    }
    
    echo json_encode(array(
        "status" => $status,
    ));

?>