<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $assignment_id = $data['assignment_id'];
    $marks_obtained = $data['marks_obtained'];
    $marks_out_of = $data['marks_out_of'];
    $feedback = $data['feedback'];
    $team_id = $data['team_id'];
    
    $get_team_details_sql = "SELECT * FROM `team` WHERE `id` = '$team_id'";
    $get_team_details_result = mysqli_query($conn, $get_team_details_sql);
    $get_team_details_row = mysqli_fetch_assoc($get_team_details_result);
    $team_role = $get_team_details_row['role'];

    $adder = $team_role . "_" . $team_id;
    
    $update_marks_sql = "UPDATE `assignment_freelance` SET `marks_obtained` = '$marks_obtained', `marks_out_of` = '$marks_out_of', `feedback` = '$feedback', `marks_added_on` = '$now', `marks_added_by` = '$adder' WHERE `assignment_id` = '$assignment_id'";
    $update_marks_result = mysqli_query($conn, $update_marks_sql);

    if($update_marks_result == true)
    {
        $status = "success";
        $message = "Marks Updated Successfully";
    }
    else
    {
        $status = "failure";
        $message = "Marks Updation Failed";
    }
    
    // echo json_encode(
    //     array(
    //         "status" => $status,
    //         "message" => $message,
    //     ));

    echo json_encode(
        array(
            // "data" => $data,
            // "adder" => $adder,
            // "update_marks_sql" => $update_marks_sql,
            "update_marks_result" => $update_marks_result,
            "status" => $status,
            "message" => $message,
        ));

?>