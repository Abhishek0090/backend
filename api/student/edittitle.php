<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $assignment_id = $data['assignment_id'];
    $title = $data['title'];
    $title = str_replace("'", " \' ", $title);

    $get_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
    $get_details_result = mysqli_query($conn, $get_details_sql) or die(mysqli_error($conn));
    $get_details_row = mysqli_fetch_assoc($get_details_result);
    $old_title = $get_details_row['title'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));
    
    $insert_into_update_table = "INSERT INTO `assignment_update` (`assignment_id`, `field`, `value`, `updated_on`) VALUES ('$assignment_id', 'title', '$old_title', '$now')";
    $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

    if($insert_into_update_table == true)
    {
        $update_sql = "UPDATE `assignment_freelance` SET `title` = '$title' WHERE `assignment_id` = '$assignment_id'";
        $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

        if($update_result == true)
        {
            $status = 200;
            $message = "Title updated successfully";
        }
        else
        {
            $message = "Title not updated";
        }
    }
    else
    {
        $message = "Title not updated";
    }
    

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
    ));

?>