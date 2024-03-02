<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $code = $data['code'];

    $get_user_details_sql = "SELECT * FROM `users` WHERE `affiliate_code` = '$code'";
    $get_user_details_result = mysqli_query($conn, $get_user_details_sql) or die(mysqli_error($conn));
    $get_user_details_row_number = mysqli_num_rows($get_user_details_result);

    if($get_user_details_row_number == 1)
    {
        $get_user_details_row = mysqli_fetch_assoc($get_user_details_result);
        $firstname = $get_user_details_row['firstname'];
        $lastname = $get_user_details_row['lastname'];
        $name = $firstname.' '.$lastname;

        echo json_encode(array(
            'status' => 'true',
            'message' => 'Valid code',
            'name' => $name,
        ));
        exit();
    }
    else
    {
        echo json_encode(array(
            'status' => 'false',
            'message' => 'Invalid code',
        ));
        exit();
    }
    // echo json_encode($data);
?>