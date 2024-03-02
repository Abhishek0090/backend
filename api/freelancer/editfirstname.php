<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];
    $first_name = $data['first_name'];
    $first_name = str_replace("'", " \' ", $first_name);

    $get_name_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $get_name_result = mysqli_query($conn, $get_name_sql) or die(mysqli_error($conn));
    $get_name_row = mysqli_fetch_assoc($get_name_result);
    $old_first_name = $get_name_row['firstname'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));
    
    $insert_into_update_table = "INSERT INTO `freelancer_update` (`freelancer_id`, `field`, `value`, `updated_on`) VALUES ('$freelancer_id', 'firstname', '$old_first_name', '$now')";
    $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

    if($insert_into_update_table == true)
    {
        $update_sql = "UPDATE `freelancers_map` SET `firstname` = '$first_name' WHERE `id` = '$freelancer_id'";
        $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

        if($update_result == true)
        {
            $status = 200;
            $message = "First name updated successfully";
        }
        else
        {
            $message = "First name not updated";
        }
    }
    else
    {
        $message = "First name not updated";
    }
    

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // 'freelancer_id' => $freelancer_id,
        // 'first_name' => $first_name,
        // 'old_first_name' => $old_first_name,
    ));

?>