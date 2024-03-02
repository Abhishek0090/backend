<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $submit = $data['submit'];

    $name = $data['name'];
    $email = $data['email'];
    $message = $data['message'];
    
    $utm_data = $data['utm_data'];
    $utm_data = json_encode($utm_data);

    if ($submit == "submit")
    {
        date_default_timezone_set('Asia/Kolkata');
        $now = date("d-m-Y H:i:s");

        $insert_contact_form_sql = "INSERT INTO `contact` (`name`, `email`, `message`, `submitted_on`, `utm_data`) 
        VALUES ('$name', '$email', '$message', '$now', '$utm_data')";
        $insert_contact_form_result = mysqli_query($conn, $insert_contact_form_sql);

        if($insert_contact_form_result == true)
        {
            $status = 200;
            $message = "Contact form submitted successfully";
        }
        else
        {
            $message = "Contact form submission failed";
            
        }

        $result = array(
            "status"=>$status, 
            "message"=>$message,
        );

    }
    else
    {
        $result = array(
            "status"=> 404,
            "message"=> "Invalid Request",
        );
    }

    echo json_encode($result);

?>