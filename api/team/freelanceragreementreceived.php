<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['id'];
    $role = $_GET['role'];

    if($role == "technical")
    {

        $Update_Agree_Received_Sql = "UPDATE `freelancers_map` SET  `technical_agreement_received` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Received_Query = mysqli_query($conn , $Update_Agree_Received_Sql);

        if($Update_Agree_Received_Query)
        {
            $message = "Technical Agreement Received Successfully";
            $status = 200;
        }
        else
        {
            $message = "Error";
        }
    }else if($role == "non_technical")
    {
        $Update_Agree_Received_Sql = "UPDATE `freelancers_map` SET  `non_technical_agreement_received` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Received_Query = mysqli_query($conn , $Update_Agree_Received_Sql);

        if($Update_Agree_Received_Query)
        {
            $message = "Non Technical Agreement Received  Successfully";
            $status = 200;
        }
        else
        {
            $message = "Error";
        }
    }

    echo json_encode(array(
        'message' => $message,
        'status' => $status,
    ));

?>