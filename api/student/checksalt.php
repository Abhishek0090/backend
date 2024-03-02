<?php

// get user email and check if it exists
// if present then get id
// generate url salt with et and item as given below
// make new api to check salt on page load
// if valid then accept new password and update
// if time expired then show time expired message
// else show invalid link

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    date_default_timezone_set("Asia/Kolkata");

    $et = $data['et'];
    $item = $data['item'];

    $id = base64_decode(urldecode($item));
    
    $now = date("Y-m-d H:i:s", strtotime("now"));
    $now_time = strtotime($now);

    if($now_time < $et)
    {
        $message = "Valid link";
        $response = array (
            'status' => 'success',
            // 'message' => $message,
            'id' => $id,
        );
    }
    else
    {
        $message = "Link expired, please try again";
        $response = array (
            'status' => 'error',
            'message' => $message,
        );
    }
    
    // $response = array(
    //     // 'status' => 'error', 
    //     // 'message' => $message,
    //     // 'id' => $id,
    //     // 'et' => $et,
    //     // 'now' => $now,
    //     // 'now_time' => $now_time,
    // );
    
    echo json_encode($response);

?>
