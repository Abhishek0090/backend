<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];
    $assignment_id = $_GET['assignment_id'];

    $send_inquiry_sql = "INSERT INTO `assignment_inquiries`(`freelancer_id`, `assignment_id`, `status`) VALUES ('$freelancer_id', '$assignment_id', '1')";
    $send_inquiry_to_freelancer_result = mysqli_query($conn, $send_inquiry_sql);

    if($send_inquiry_to_freelancer_result)
    {
        $status = "Inquiry Sent Successfully";
    }
    else
    {
        $status = "Error";
    }

    echo json_encode(array(
        'status' => $status 
    ));

?>