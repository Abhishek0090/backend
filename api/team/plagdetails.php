<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    // $logged_in_user_role = $_GET['role'];

    $get_details_sql = "SELECT * FROM `assignment_plag_check` WHERE `id` = '$id'";
    $get_details_result = mysqli_query($conn, $get_details_sql);
    $get_details_data = mysqli_fetch_assoc($get_details_result);

    $name = $get_details_data['name'];
    $email = $get_details_data['email'];
    $country_name = $get_details_data['country_name'];
    $country_code = $get_details_data['country_code'];
    $number = $get_details_data['number'];
    $files = $get_details_data['files'];
    $submission_date = $get_details_data['submission_date'];
    $amount = $get_details_data['amount'];
    $status = $get_details_data['status'];
    $update_time = $get_details_data['update_time'];
    $checked_files = $get_details_data['checked_files'];
    $delivery_time = $get_details_data['delivery_time'];
    $checked_by = $get_details_data['checked_by'];

    $get_team_member_name_sql = "SELECT * FROM  `team` WHERE `id` = '$checked_by'";
    $get_team_member_name_result = mysqli_query($conn, $get_team_member_name_sql);
    $get_team_member_name_data = mysqli_fetch_assoc($get_team_member_name_result);
    $team_name = $get_team_member_name_data['name'];


    echo json_encode(array(
        "id" => $id,
        "assignment_id" => $id,
        "name" => $name,
        "email" => $email,
        "country_name" => $country_name,
        "country_code" => $country_code,
        "number" => $number,
        "files" => $files,
        "submission_date" => $submission_date,
        "amount" => $amount,
        "status" => $status,
        "update_time" => $update_time,
        "checked_files" => $checked_files,
        "delivery_time" => $delivery_time,
        "checked_by" => $checked_by,
        "team_name" => $team_name
    ));
    
?>