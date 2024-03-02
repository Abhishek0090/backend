<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $id = $data['id'];
    $id = $_GET['id'];

    $get_personal_details_sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $get_personal_details_result = mysqli_query($conn, $get_personal_details_sql) or die(mysqli_error($conn));
    $get_personal_details_row = mysqli_fetch_assoc($get_personal_details_result);

    $firstname = $get_personal_details_row['firstname'];
    $lastname = $get_personal_details_row['lastname'];
    $college = $get_personal_details_row['college'];
    $email = $get_personal_details_row['email'];
    $country  = $get_personal_details_row['country'];
    $number = $get_personal_details_row['number'];
    $address = $get_personal_details_row['address'];
    $university = $get_personal_details_row['university'];
    $course = $get_personal_details_row['course'];
    $affiliate_code = $get_personal_details_row['affiliate_code'];
    $signin_method = $get_personal_details_row['signin_method'];
    $wallet = $get_personal_details_row['wallet'];
    $is_select = $get_personal_details_row['is_select'];
    $date_of_birth = $get_personal_details_row['date_of_birth'];
    $account_creation = $get_personal_details_row['created'];
    $password = $get_personal_details_row['password'];

    $total_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id'";
    $total_assignments_count_result = mysqli_query($conn, $total_assignments_count_sql) or die(mysqli_error($conn));
    $total_assignments_count_row = mysqli_fetch_assoc($total_assignments_count_result);
    $total_assignments_count = $total_assignments_count_row['COUNT(*)'];

    $total_freelancing_assignments_count_sql = "SELECT COUNT(*) FROM `assignment_map` WHERE `user_id` = '$id' AND `domain` = 'Freelancer'";
    $total_freelancing_assignments_count_result = mysqli_query($conn, $total_freelancing_assignments_count_sql) or die(mysqli_error($conn));
    $total_freelancing_assignments_count_row = mysqli_fetch_assoc($total_freelancing_assignments_count_result);
    $total_freelancing_assignments_count = $total_freelancing_assignments_count_row['COUNT(*)'];

    if($is_select == 1)
    {
        $get_select_details_sql = "SELECT * FROM `users_select` WHERE `user_id` = '$id'";
        $get_select_details_result = mysqli_query($conn, $get_select_details_sql) or die(mysqli_error($conn));
        $get_select_details_row = mysqli_fetch_assoc($get_select_details_result);

        $addition_date = $get_select_details_row['addition_date'];
        $expiry_date = $get_select_details_row['expiry_date'];
    }

    $student_data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'college' => $college,
        'email' => $email,
        'country' => $country,
        'number' => $number,
        'address' => $address,
        'university' => $university,
        'course' => $course,
        'affiliate_code' => $affiliate_code,
        'wallet_coins' => $wallet,
        'is_select' => $is_select,
        'addition_date' => $addition_date,
        'expiry_date' => $expiry_date,
        'signin_method' => $signin_method,
        'date_of_birth' => $date_of_birth,
        'total_assignments_count' => $total_assignments_count,
        'total_freelancing_assignments_count' => $total_freelancing_assignments_count,
        'total_writing_assignments_count' => $total_writing_assignments_count,
        'total_ed_assignments_count' => $total_ed_assignments_count,
        'total_typing_assignments_count' => $total_typing_assignments_count,
        'total_art_assignments_count' => $total_art_assignments_count,
    );

    echo json_encode($student_data);

?>