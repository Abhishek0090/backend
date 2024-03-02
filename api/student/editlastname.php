<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    $last_name = $data['last_name'];
    $last_name = str_replace("'", " \' ", $last_name);

    $get_name_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $get_name_result = mysqli_query($conn, $get_name_sql) or die(mysqli_error($conn));
    $get_name_row = mysqli_fetch_assoc($get_name_result);
    $old_last_name = $get_name_row['lastname'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));
    
    $insert_into_update_table = "INSERT INTO `user_update` (`user_id`, `field`, `value`, `updated_on`) VALUES ('$user_id', 'lastname', '$old_last_name', '$now')";
    $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

    if($insert_into_update_table == true)
    {
        $update_sql = "UPDATE `users` SET `lastname` = '$last_name' WHERE `id` = '$user_id'";
        $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

        if($update_result == true)
        {
            $status = 200;
            $message = "Last name updated successfully";
        }
        else
        {
            $message = "Last name not updated";
        }
    }
    else
    {
        $message = "Last name not updated";
    }
    

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // 'user_id' => $user_id,
        // 'first_name' => $first_name,
        // 'old_first_name' => $old_first_name,
        // 'data' => $data,
    ));

?>