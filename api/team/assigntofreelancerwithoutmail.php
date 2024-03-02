<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];
    $assignment_id = $data['assignment_id'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y", strtotime("now"));

    $assign_to_freelancer_sql = "INSERT INTO `assign_to_freelancer`(`freelancer_id`, `assignment_id`, `status`) VALUES ('$freelancer_id', '$assignment_id', '1')";
    $assign_to_freelancer_query = mysqli_query($conn, $assign_to_freelancer_sql);

    if($assign_to_freelancer_query)
    {
        $message = "Assignment Assigned";
        $status = 200;
        echo json_encode(array(
            'message' => $message ,
            'status' => 200
        ));
    }
    else
    {
        $message = "Assignment not assigned";
        echo json_encode(array(
            'message' => $message ,
            'status' => $status
        ));
        exit();
    }

?>