<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
 
    $assignment_id = $_GET['assignment_id'];
    $freelancer_id = $_GET['freelancer_id'];
  
 
    $unassign_sql = "UPDATE `assign_to_freelancer` SET `status` = '0'  WHERE `assignment_id` =  '$assignment_id' AND  `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC" ; 
    $unassign_query = mysqli_query($conn, $unassign_sql);



    if($unassign_query)
    {
        $status = "Assignment Unassign  Successfully";
    }
    else
    {
        $status = "Error";
    }

    echo json_encode(array(
        'status' => $status 
    ));

?>