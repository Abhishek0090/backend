<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    $status = $_GET['status'];


    if($status == "posted")
    {

        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `posted` = '1'  WHERE `assignment_id` = '".$id."' "  ;
        $updated_Query = mysqli_query($conn , $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to Posted Successfully";
        }
        else
        {
            $status = "Error";
        }
    } 
    else
    if($status == "under_process")
    {

        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `under_process` = '1'  WHERE `assignment_id` = '".$id."' "  ;
        $updated_Query = mysqli_query($conn , $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to Under Process Successfully";
        }
        else
        {
            $status = "Error";
        }
    }
    else if($status == "assigned_to_pm")
    {
        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `assigned_to_pm` = '1'  WHERE `assignment_id` = '".$id."' ";
        $updated_Query = mysqli_query($conn, $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to Assigned to Pm Successfully";
        }
        else
        {
            $status = "Error";
        }
    } 

    else if($status == "assigned_to_freelancer")
    {
        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `assigned_to_freelancer` = '1' AND `completed` = '1' WHERE `assignment_id` = '".$id."' ";
        $updated_Query = mysqli_query($conn, $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to Assigned to Freelancer Successfully";
        }
        else
        {
            $status = "Error";
        }
    }

    else if($status == "completed")
    {
        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `completed` = '1' WHERE `assignment_id` = '".$id."' ";
        $updated_Query = mysqli_query($conn, $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to Completed Successfully";
        }
        else
        {
            $status = "Error";
        }
    }

    else if($status == "review_received")
    {
        $Update_Status_Sql = "UPDATE `assignment_freelance` SET `review_recieved` = '1' WHERE `assignment_id` = '".$id."' ";
        $updated_Query = mysqli_query($conn, $Update_Status_Sql);

        if($updated_Query)
        {
            $status = "Status Updated to review Received Successfully";
        }
        else
        {
            $status = "Error";
        }
    }

    echo json_encode(array(
        'status' => $status,
        'update status sql' => $Update_Status_Sql,
        'updated query' => $updated_Query,
    ));

?>