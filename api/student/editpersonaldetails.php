<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];

    // get existing user details from user id
    // check which details have been updated
    // regex on the updated details
    // if valid then update the details
    // store old details in a history table
    // return success message

    // echo json_encode($dummy_array);
    echo json_encode("Personal Details Updated");

?>