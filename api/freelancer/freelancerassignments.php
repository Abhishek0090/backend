<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];

    // loop through map table over freelancer id
    // if id matches, get assignment id
    // loop through assignments table over assignment id
    // if id matches, get assignment details
    // return assignment name with title, deadline and status (inquiry, assigned, etc.)

?>