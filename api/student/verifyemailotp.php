<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];
    $otp = $data['otp'];
    // $email_data = explode(",", $email);
    // $email = $email_data[0];
    // $otp = $data['otp'];

    if($email == NULL || $email == "")
    {
        echo json_encode(array(
            'message' => 'Email is required',
            'email' => $email
        ));
        exit();
    }

    else if ($otp == NULL || $otp = "")
    {
        echo json_encode(array(
            'message' => 'OTP is required',
            'data' => $data
        ));
        exit();
    }

    else
    {
        $otp = $data['otp'];

        $check_email_in_table_sql = "SELECT * FROM `student_otp_email` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 1";
        $check_email_in_table_result = mysqli_query($conn, $check_email_in_table_sql) or die(mysqli_error($conn));
        $check_email_in_table_row_number = mysqli_num_rows($check_email_in_table_result);
        $check_email_in_table_row = mysqli_fetch_assoc($check_email_in_table_result);

        if($check_email_in_table_row_number == 0)
        {
            echo json_encode(array('message' => 'Email not found'));
            exit();
        }

        else if($check_email_in_table_row_number == 1)
        {
            $otp_in_table = $check_email_in_table_row['otp'];
            $expiry_in_table = $check_email_in_table_row['expiry'];

            date_default_timezone_set("Asia/Kolkata");
            $now = date("Y-m-d H:i:s", strtotime("now"));

            if($otp_in_table == $otp)
            {
                
                if($now > $expiry_in_table)
                {
                    echo json_encode(array('message' => 'OTP expired'));
                    exit();
                }

                else
                {
                    echo json_encode(array(
                        'message' => 'OTP verified',
                        'status' => 200
                    ));
                    exit();
                }
            }

            else
            {
                echo json_encode(array(
                    'message' => 'OTP incorrect',
                    'entered otp' => $otp,
                    'otp in table' => $otp_in_table
                ));
                exit();
            }
        }
    }

    // echo json_encode($data);
?>