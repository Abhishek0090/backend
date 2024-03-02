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

    $get_student_details_sql = "SELECT * FROM `users` WHERE `id` = '$student_id'";
    $get_student_details = mysqli_query($conn, $get_student_details_sql);
    $get_student_details_row = mysqli_fetch_assoc($get_student_details);
    $firstname = $get_student_details_row['firstname'];
    $lastname = $get_student_details_row['lastname'];
    $name = $firstname . " " . $lastname;
    $role = "Student";

    $message_details_sql = "SELECT * FROM `team_and_student_chat` WHERE `id` = '$message_id'";
    $message_details = mysqli_query($conn, $message_details_sql);
    $message_details_row = mysqli_fetch_assoc($message_details);
    $is_deleted = $message_details_row['is_deleted'];

    if($is_deleted == null)
    {
        $deleted_json = array(
            "deleted_by" => $team_id,
            "deleted_on" => $now,
            "deleted_by_name" => $name,
            "deleted_by_role" => $role,
        );
        $deleted_json = json_encode($deleted_json);

        $update_message_data_sql = "UPDATE `team_and_student_chat` SET `is_deleted` = '$deleted_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message Deleted";
        }
        
    }
    
    echo json_encode(array(
        "status" => $status,
    ));

?>