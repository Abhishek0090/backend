<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $submit = $data['submit'];
    
    $page_name = $data['page_name'];
    $data = $data['data'];
    $data = json_encode($data);

    if ($submit == "submit")
    {
        date_default_timezone_set('Asia/Kolkata');
        $now = date("d-m-Y H:i:s");

        $insert_contact_form_sql = "INSERT INTO `marketing_data` (`page_name`, `data`, `added_on`) VALUES ('$page_name', '$data', '$now')";
        $insert_contact_form_result = mysqli_query($conn, $insert_contact_form_sql);

        if($insert_contact_form_result == true)
        {
            $status = 200;
            $message = "Ad data added successfully";
        }
        else
        {
            $message = "Adding data failed";
            
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