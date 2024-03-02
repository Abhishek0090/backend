<?php
    header('Content-Type: application/json');
    // header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_email = $data['email'];
    $freelancer_email_verified = $data['email_verified'];
    $freelancer_country_name = $data['country_name'];
    $freelancer_country_code = $data['country_code'];
    $freelancer_number = $data['number'];
    $freelancer_number_verified = $data['number_verified'];
    $freelancer_role = $data['role'];

    $is_email_present = 0;
    $is_number_present = 0;
    $details_present_in_system = 0;
    $presence_in_same_tuple = 0;
    
    $register_for_technical = 0;
    $register_for_non_technical = 0;
    $register_for_writer = 0;

    $technical_present = 0;
    $non_technical_present = 0;
    $writer_present = 0;

    $status = 400;

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
        $message = "check if present in same tuple and proceed accordingly";

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
            $message = "Checked Database and you are already registered and the entered email id and number match";
            $technical_present = $get_freelancer_details_row['technical'];
            $non_technical_present = $get_freelancer_details_row['non technical'];
            $writer_present = $get_freelancer_details_row['writer'];

            if($register_for_technical == 1)
            {
                if($technical_present == 1)
                {
                    $message = "You are already registered as a technical freelancer. Your status will be updated to you";
                    
                    $registered_freelancer_firstname = $get_freelancer_details_row['firstname'];
                    $registered_freelancer_lastname = $get_freelancer_details_row['lastname'];
                    $registered_freelancer_email = $get_freelancer_details_row['email'];
                    $registered_freelancer_country_name = $get_freelancer_details_row['country_name'];
                    $registered_freelancer_country_code = $get_freelancer_details_row['country_code'];
                    $registered_freelancer_number = $get_freelancer_details_row['number'];
                    $registered_freelancer_whatsapp = $get_freelancer_details_row['whatsapp'];
                    $registered_freelancer_gender = $get_freelancer_details_row['gender'];
                    $registered_freelancer_address = $get_freelancer_details_row['address'];
                    $registered_freelancer_street = $get_freelancer_details_row['street'];
                    $registered_freelancer_city = $get_freelancer_details_row['city'];
                    $registered_freelancer_state = $get_freelancer_details_row['state'];
                    $registered_freelancer_pincode = $get_freelancer_details_row['pincode'];
                    $registered_freelancer_terms = $get_freelancer_details_row['terms'];
                    
                    $freelancer_data = array(
                        "message" => $message,
                        "firstname" => $registered_freelancer_firstname,
                        "lastname" => $registered_freelancer_lastname,
                        "email" => $registered_freelancer_email,
                        "country_name" => $registered_freelancer_country_name,
                        "country_code" => $registered_freelancer_country_code,
                        "number" => $registered_freelancer_number,
                        "whatsapp" => $registered_freelancer_whatsapp,
                        "gender" => $registered_freelancer_gender,
                        "address" => $registered_freelancer_address,
                        "street" => $registered_freelancer_street,
                        "city" => $registered_freelancer_city,
                        "state" => $registered_freelancer_state,
                        "pincode" => $registered_freelancer_pincode,
                        "terms" => $registered_freelancer_terms,
                    );
                }
                else
                {
                    $message = "Register for Technical";
                    $status = 200;
                    $freelancer_data = array(
                        "email" => $freelancer_email,
                        "number" => $freelancer_number,
                        "country_code" => $freelancer_country_code,
                        "country_name" => $freelancer_country_name,
                    );
                }
            }

            else if ($register_for_non_technical == 1)
            {
                if($non_technical_present == 1)
                {
                    $message = "You are already registered as a non technical freelancer";

                    $registered_freelancer_firstname = $get_freelancer_details_row['firstname'];
                    $registered_freelancer_lastname = $get_freelancer_details_row['lastname'];
                    $registered_freelancer_email = $get_freelancer_details_row['email'];
                    $registered_freelancer_country_name = $get_freelancer_details_row['country_name'];
                    $registered_freelancer_country_code = $get_freelancer_details_row['country_code'];
                    $registered_freelancer_number = $get_freelancer_details_row['number'];
                    $registered_freelancer_whatsapp = $get_freelancer_details_row['whatsapp'];
                    $registered_freelancer_gender = $get_freelancer_details_row['gender'];
                    $registered_freelancer_address = $get_freelancer_details_row['address'];
                    $registered_freelancer_street = $get_freelancer_details_row['street'];
                    $registered_freelancer_city = $get_freelancer_details_row['city'];
                    $registered_freelancer_state = $get_freelancer_details_row['state'];
                    $registered_freelancer_pincode = $get_freelancer_details_row['pincode'];
                    $registered_freelancer_terms = $get_freelancer_details_row['terms'];

                    $freelancer_data = array(
                        "message" => $message,
                        "firstname" => $registered_freelancer_firstname,
                        "lastname" => $registered_freelancer_lastname,
                        "email" => $registered_freelancer_email,
                        "country_name" => $registered_freelancer_country_name,
                        "country_code" => $registered_freelancer_country_code,
                        "number" => $registered_freelancer_number,
                        "whatsapp" => $registered_freelancer_whatsapp,
                        "gender" => $registered_freelancer_gender,
                        "address" => $registered_freelancer_address,
                        "street" => $registered_freelancer_street,
                        "city" => $registered_freelancer_city,
                        "state" => $registered_freelancer_state,
                        "pincode" => $registered_freelancer_pincode,
                        "terms" => $registered_freelancer_terms,
                    );
                }
                else
                {
                    $message = "Register for Non Technical";
                    $status = 200;
                    $freelancer_data = array(
                        "email" => $freelancer_email,
                        "number" => $freelancer_number,
                        "country_code" => $freelancer_country_code,
                        "country_name" => $freelancer_country_name,
                    );
                }
            }

            else if ($register_for_writer == 1)
            {
                if($writer_present == 1)
                {
                    $message = "You are already registered as a writer";

                    $registered_freelancer_firstname = $get_freelancer_details_row['firstname'];
                    $registered_freelancer_lastname = $get_freelancer_details_row['lastname'];
                    $registered_freelancer_email = $get_freelancer_details_row['email'];
                    $registered_freelancer_country_name = $get_freelancer_details_row['country_name'];
                    $registered_freelancer_country_code = $get_freelancer_details_row['country_code'];
                    $registered_freelancer_number = $get_freelancer_details_row['number'];
                    $registered_freelancer_whatsapp = $get_freelancer_details_row['whatsapp'];
                    $registered_freelancer_gender = $get_freelancer_details_row['gender'];
                    $registered_freelancer_address = $get_freelancer_details_row['address'];
                    $registered_freelancer_street = $get_freelancer_details_row['street'];
                    $registered_freelancer_city = $get_freelancer_details_row['city'];
                    $registered_freelancer_state = $get_freelancer_details_row['state'];
                    $registered_freelancer_pincode = $get_freelancer_details_row['pincode'];
                    $registered_freelancer_terms = $get_freelancer_details_row['terms'];

                    $freelancer_data = array(
                        "message" => $message,
                        "firstname" => $registered_freelancer_firstname,
                        "lastname" => $registered_freelancer_lastname,
                        "email" => $registered_freelancer_email,
                        "country_name" => $registered_freelancer_country_name,
                        "country_code" => $registered_freelancer_country_code,
                        "number" => $registered_freelancer_number,
                        "whatsapp" => $registered_freelancer_whatsapp,
                        "gender" => $registered_freelancer_gender,
                        "address" => $registered_freelancer_address,
                        "street" => $registered_freelancer_street,
                        "city" => $registered_freelancer_city,
                        "state" => $registered_freelancer_state,
                        "pincode" => $registered_freelancer_pincode,
                        "terms" => $registered_freelancer_terms,
                    );
                }
                else
                {
                    $message = "Register for Writer";
                    $status = 200;
                    $freelancer_data = array(
                        "email" => $freelancer_email,
                        "number" => $freelancer_number,
                        "country_code" => $freelancer_country_code,
                        "country_name" => $freelancer_country_name,
                    );
                }
            }
        }
    }
    
    else if($is_email_present == 0 && $is_number_present == 0)
    {
        $message = "New Freelancer Signup";
        $status = 200;
        $freelancer_data = array(
            "email" => $freelancer_email,
            "number" => $freelancer_number,
            "country_code" => $freelancer_country_code,
            "country_name" => $freelancer_country_name,
        );
    }
    
    else
    {
        $message = "You are already registered but the entered email id and number do not match.";
    }

    echo json_encode(array(
        // 'is_email_present' => $is_email_present,
        // 'check_email_sql' => $check_email_sql,
        // 'is_number_present' => $is_number_present,
        // 'check_number_sql' => $check_number_sql,
        'apply_for_role' => $freelancer_role,
        // 'register_for_technical' => $register_for_technical,
        // 'register_for_non_technical' => $register_for_non_technical,
        // 'register_for_writer' => $register_for_writer,
        'present_technical' => $technical_present,
        'present_non_technical' => $non_technical_present,
        'present_writer' => $writer_present,
        // 'get_freelancers_data_sql' => $get_freelancer_details_sql,
        'message' => $message,
        // 'received data' => $data,
        'freelancer_data' => $freelancer_data,
        'status' => $status,
    ));

?>