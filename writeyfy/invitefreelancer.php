<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    // $freelancer_id = $_GET['id'];
    $requirements_id = $_GET['requirements_id'];
    $user_id = $_GET['user_id'];

    $get_freelancer_data_sql = "SELECT * FROM `freelancers_map` WHERE `user_id` = '$user_id'";
    $get_freelancer_data_result = mysqli_query($conn, $get_freelancer_data_sql);
    $get_freelancer_data_row = mysqli_fetch_assoc($get_freelancer_data_result);

    $freelancer_id = $get_freelancer_data_row['id'];

    $insert_into_invites_sql = "INSERT INTO `requirements_invites`(`requirements_id`, `freelancer_id`, `invited_on`) VALUES ('$requirements_id', '$freelancer_id', '$now')";
    $insert_into_invites_result = mysqli_query($conn, $insert_into_invites_sql);

    $response = array(
        'status' => 'success',
        'message' => 'Freelancer invited successfully',
        'freelancer_id' => $freelancer_id,
        'requirements_id' => $requirements_id,
        'user_id' => $user_id,
        'now' => $now,
        'insert_into_invites_result' => $insert_into_invites_result
    );

    echo json_encode($response);

?>