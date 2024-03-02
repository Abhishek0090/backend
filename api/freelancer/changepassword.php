<?php
    header('Content-Type: application/json');
    // header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];
    $old_password = $data['old_password'];
    $new_password = $data['new_password'];

    $get_old_password_sql = "SELECT `password` FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $get_old_password_result = mysqli_query($conn, $get_old_password_sql);
    $get_old_password_row = mysqli_fetch_assoc($get_old_password_result);
    $old_password_db = $get_old_password_row['password'];

    $hashed_password_check = password_verify($old_password, $old_password_db);

    if($hashed_password_check == TRUE)
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $update_password_sql = "UPDATE `freelancers_map` SET `password` = '$hashed_password' WHERE `id` = '$freelancer_id'";
        $update_password_result = mysqli_query($conn, $update_password_sql);

        if($update_password_result == TRUE)
        {
            $data_array = array(
                "status" => "success",
                "message" => "Password Changed Successfully"
            );
        }
        else
        {
            $data_array = array(
                "status" => "error",
                "message" => "Password Changing Failed"
            );
        }
    }
    else
    {
        $data_array = array(
            "status" => "error",
            "message" => "Old Password is Incorrect",
        );
    }

    echo json_encode($data_array);
?>