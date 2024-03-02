<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    $address = $data['address'];
    $address = str_replace("'", " \' ", $address);

    $get_name_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $get_name_result = mysqli_query($conn, $get_name_sql) or die(mysqli_error($conn));
    $get_name_row = mysqli_fetch_assoc($get_name_result);
    $old_address = $get_name_row['address'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));
    
    $insert_into_update_table = "INSERT INTO `user_update` (`user_id`, `field`, `value`, `updated_on`) VALUES ('$user_id', 'address', '$old_address', '$now')";
    $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

    if($insert_into_update_table == true)
    {
        $update_sql = "UPDATE `users` SET `address` = '$address' WHERE `id` = '$user_id'";
        $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

        if($update_result == true)
        {
            $status = 200;
            $message = "Address updated successfully";
        }
        else
        {
            $message = "Address not updated";
        }
    }
    else
    {
        $message = "Address not updated";
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