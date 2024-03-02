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

        $Update_Int_Condition_Sql = "UPDATE `freelancers_map` SET `technical` = '1'   ,`technical_interview_conducted` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Int_Condition_Query = mysqli_query($conn , $Update_Int_Condition_Sql);

        if($Update_Int_Condition_Query)
        {
            $message = "Technical Interview Conducted  Successfully";
            $status = 200;
        }
        else
        {
            $message = "Technical Freelancer Error";
        }
    }else if($role == "non_technical")
    {
        $Update_Int_Condition_Sql = "UPDATE `freelancers_map` SET `non technical` = '1' ,  `non_technical_interview_conducted` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Int_Condition_Query = mysqli_query($conn , $Update_Int_Condition_Sql);

        if($Update_Int_Condition_Query)
        {
            $message = "Non Technical Interview Conducted  Successfully";
            $status = 200;
        }
        else
        {
            $message = "Non Technical Freelancer Error";
        }
    }

    echo json_encode(array(
        'message' => $message,
        'status' => $status,
    ));

?>