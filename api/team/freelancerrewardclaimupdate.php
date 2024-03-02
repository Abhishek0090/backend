<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $claim_id = $_GET['claim_id'];
    $status = $_GET['status'];

    if($status == "Sent")
    {
        // update status to sent
        $update_status = "UPDATE freelancer_reward_claims SET `sent` = 1 WHERE id = '$claim_id'";
        $update_status_result = mysqli_query($conn, $update_status);
        if($update_status_result)
        {
            echo json_encode(array("message" => "Status updated successfully", "status" => "success"));
        }
        else
        {
            echo json_encode(array("message" => "Status not updated", "status" => "error"));
        }
    }
    else if($status == "Received")
    {
        // update status to received
        $update_status = "UPDATE freelancer_reward_claims SET `received` = 1 WHERE id = '$claim_id'";
        $update_status_result = mysqli_query($conn, $update_status);
        if($update_status_result)
        {
            echo json_encode(
                array(
                    "message" => "Status updated successfully", 
                    "status" => "success"
                ));
        }
        else
        {
            echo json_encode(
                array(
                    "message" => "Status not updated", 
                    "status" => "error"
                ));
        }
    }
?>