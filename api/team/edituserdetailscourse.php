<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'];
    $course = $data['course'];

    $update_password_sql = "UPDATE `users` SET `course` = '$course' WHERE `id` = '$id'";
    $update_password_result = mysqli_query($conn, $update_password_sql);

    $response = array(
        'status' => 'success',
        'message' => 'Course Updated Successfully',
        'result' => $update_password_result,
    );

    echo json_encode($response);

?>