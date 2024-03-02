<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);
    
    $assignment_id = $data['assignment_id'];
    $reason = $data['reason'];
    $reason = str_replace("'", "\'", $reason);

    $assign_lost_sql = "UPDATE `assignment_freelance` SET `posted` = '-1' , `under_process` = '-1', `assigned_to_pm` = '-1', `assigned_to_freelancer` = '-1', `completed` = '-1' , `review_recieved` = '-1' , `lost` = '1' WHERE `assignment_id` = '$assignment_id'"; 
    $assign_lost_query = mysqli_query($conn, $assign_lost_sql);

    if($assign_lost_query == true)
    {
        $insert_reason_sql = "INSERT INTO `lost_reason` (`assign_id`, `reason`, `date_time`) VALUES ('$assignment_id', '$reason', '$now')";
        $insert_reason_query = mysqli_query($conn, $insert_reason_sql);
        
        $status = 200;
        $message = "Assignment set to Lost Successfully";
    }
    else
    {
        $message = "Error";
    }

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // 'assign lost sql' => $assign_lost_sql,
        // 'insert reason sql' => $insert_reason_sql,
    ));
?>
