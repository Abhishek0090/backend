<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));
    
    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $user_id = $data['student_id'];
    $team_id = $data['team_id'];

    $update_student_sql = "UPDATE `users` SET `is_select` = '0' WHERE `id` = '$user_id'";
    $update_student_result = mysqli_query($conn, $update_student_sql);

    $remove_from_select_sql = "UPDATE `users_select` SET `membership_cancelled_by` = '$team_id', `membership_cancelled_on` = '$now' WHERE `user_id` = '$user_id'";
    $remove_from_select_result = mysqli_query($conn, $remove_from_select_sql);

    echo json_encode(array(
        'status' => 200,
        'user_id' => $user_id,
        // 'update_student_sql' => $update_student_sql,
        // 'remove_from_select_sql' => $remove_from_select_sql
    ));
?>