<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $assignment_id = $data['assignment_id'];
    $freelancer_id = $data['freelancer_id'];

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $get_assignment_status_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
    $get_assignment_status_result = mysqli_query($conn, $get_assignment_status_sql);
    $get_assignment_status_data = mysqli_fetch_assoc($get_assignment_status_result);

    $status = $get_assignment_status_data['posted'];

    $check_if_already_assigned_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = '$assignment_id' AND `freelancer_id` = '$freelancer_id'";
    $check_if_already_assigned_result = mysqli_query($conn, $check_if_already_assigned_sql);
    $check_if_already_assigned_data = mysqli_fetch_assoc($check_if_already_assigned_result);
    $check_if_already_assigned_num = mysqli_num_rows($check_if_already_assigned_result);

    if($check_if_already_assigned_num == 1)
    {
        $status = "Already Assigned";
    }
    else if($check_if_already_assigned_num == 0)
    {
        $assign_to_freelancer_sql = "INSERT INTO `assign_to_freelancer`(`freelancer_id`, `assignment_id`, `status`, `date_time`) VALUES ('$freelancer_id', '$assignment_id', '$status', '$now')";
        $assign_to_freelancer_result = mysqli_query($conn, $assign_to_freelancer_sql);
        if($assign_to_freelancer_result == TRUE)
        {
            $status = "Assigned Now";
        }
        else
        {
            $status = "Failed";
        }
    }
    else if($check_if_already_assigned_num > 1)
    {
        $status = "Failed, Assigned more than once";
    }
    else if($check_if_already_assigned_num < 0)
    {
        $status = "Failed. Ghanghor Error";
    }


    echo json_encode(array(
        'status' => $status,
        "assign sql" => $assign_to_freelancer_sql,
        // "num" => $check_if_already_assigned_num,
        // 'result' => $send_inquiry_to_freelancer_result,
    ));

?>