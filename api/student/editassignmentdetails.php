<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    $assignment_id = $data['assignment_id'];

    // get existing assignment details from assignment id
    // check which details have been updated
    // regex on the updated details
    // if valid then update the details
    // store old details in a history table
    // return success message

    echo json_encode("Assignment Details updated");

?>  