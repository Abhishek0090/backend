<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $freelancer_email = mysqli_real_escape_string($conn, $_POST['email']);
    // $freelancer_email_verified = mysqli_real_escape_string($conn, $_POST['email_verified']);
    // $freelancer_country = mysqli_real_escape_string($conn, $_POST['country']);
    // $freelancer_number = mysqli_real_escape_string($conn, $_POST['number']);
    // $freelancer_number_verified = mysqli_real_escape_string($conn, $_POST['number_verified']);
    // $freelancer_role = mysqli_real_escape_string($conn, $_POST['role']);

    $freelancer_email = $data['email'];
    $freelancer_email_verified = $data['email_verified'];
    $freelancer_country = $data['country'];
    $freelancer_number = $data['number'];
    $freelancer_number_verified = $data['number_verified'];
    $freelancer_role = $data['role'];

    $register_for_technical = 0;
    $register_for_non_technical = 0;
    $register_for_writer = 0;
    
    // if ($freelancer_role === "Technical")
    //     $register_for_technical = 1;
    // else if ($freelancer_role === "Non Technical")
    //     $register_for_non_technical = 1;
    // else if ($freelancer_role === "Writer")
    //     $register_for_writer = 1;
    
    switch($freelancer_role)
    {
        case "Technical":
            $register_for_technical = 1;
            break;
        case "Non Technical":
            $register_for_non_technical = 1;
            break;
        case "Writer":
            $register_for_writer = 1;
            break;
    }
    
    $is_email_present = 0;
    $is_number_present = 0;

    $technical_present = 0;
    $non_technical_present = 0;
    $writer_present = 0;
    
    $check_email_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);
    $check_email_row = mysqli_fetch_assoc($check_email_result);
    $check_email_num = mysqli_num_rows($check_email_result);

    if ($check_email_num == 1)
        $is_email_present = 1;

    $check_number_sql = "SELECT * FROM `freelancers_map` WHERE `number` = '$freelancer_number'";
    $check_number_result = mysqli_query($conn, $check_number_sql);
    $check_number_row = mysqli_fetch_assoc($check_number_result);
    $check_number_num = mysqli_num_rows($check_number_result);

    if ($check_number_num == 1)
        $is_number_present = 1;

    if($is_email_present == 1 && $is_number_present == 1)
    {
        $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email' AND `number` = '$freelancer_number'";
        $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
        $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details_result);
        $get_freelancer_details_num = mysqli_num_rows($get_freelancer_details_result);

        if($get_freelancer_details_num == 0)
        {
            $message = "You are already registered but the entered email id and number do not match";
        }

        else
        {
            if($get_freelancer_details_row['technical'] == 1)
                $technical_present = 1;
            if($get_freelancer_details_row['non technical'] == 1)
                $non_technical_present = 1;
            if($get_freelancer_details_row['writer'] == 1)
                $writer_present = 1;

            $message = "You are already registered";

            if($technical_present == 1)
            {
                $present_technical_message = $message." for technical";
            }
            else if($non_technical_present == 1)
            {
                $present_non_technical_message = $message." for non technical";
            }
            else if($writer_present == 1)
            {
                $present_writer_message = $message." for writer";
            }
        }
        
        // $technical_present = $check_email_row['register_for_technical'];
        // $non_technical_present = $check_email_row['register_for_non_technical'];
        // $writer_present = $check_email_row['register_for_writer'];
    }

    else if($is_email_present == 0 && $is_number_present == 0)
    {
        $message = "New Registration";
        if($freelancer_role == "Technical")
        {
            $new_technical_message = $message." for technical";
        }
        else if($freelancer_role == "Non Technical")
        {
            $new_non_technical_message = $message." for non technical";
        }
        else if($freelancer_role == "Writer")
        {
            $new_writer_message = $message." for writer";
        }
    }

    else
    {
        // echo json_encode(array(
        //     "message" => "You are already registered but the entered email id and number do not match.",
        // ));
        $message = "You are already registered but the entered email id and number do not match.";
    }

    echo json_encode(array(
        // "data" => $data,
        "message" => $message,
        "new technical message" => $new_technical_message,
        "new non technical message" => $new_non_technical_message,
        "new writer message" => $new_writer_message,
        "present technical message" => $present_technical_message,
        "present non technical message" => $present_non_technical_message,
        "present writer message" => $present_writer_message,
        // "freelancer_email" => $freelancer_email,
        // "check email sql" => $check_email_sql,
        "is_email_present" => $is_email_present,
        "is_number_present" => $is_number_present,
        "freelancer details num" => $get_freelancer_details_num,
        "technical_present" => $technical_present,
        "non_technical_present" => $non_technical_present,
        "writer_present" => $writer_present,
    ));
?>