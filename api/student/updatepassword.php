<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'];
    $new_password = $data['new_password'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $update_password_sql = "UPDATE `users` SET `password` = '$hashed_password' WHERE `id` = '$id'";
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
    echo json_encode($data_array);
?>