<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    // $jwt = $_GET['jwt'];
    $data = json_decode(file_get_contents("php://input"), true);
    $token = $data['jwt'];

    $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);

    echo json_encode(array(
        "jwt" => $jwt,
        "received_data" => $data,
    ));
    
?>