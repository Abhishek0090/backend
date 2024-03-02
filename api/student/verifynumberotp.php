<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $number = $data['number'];
    $entered_otp = $data['otp'];
    $otp = $data['otp'];

    if($number == NULL || $number == "")
    {
        echo json_encode(array('message' => 'Number is required'));
        exit();
    }

    else if ($otp == NULL || $otp = "")
    {
        echo json_encode(array('message' => 'OTP is required'));
        exit();
    }

    else
    {
        $check_number_in_table_sql = "SELECT * FROM `student_otp_number` WHERE `number` = '$number' ORDER BY `id` DESC LIMIT 1";
        $check_number_in_table_result = mysqli_query($conn, $check_number_in_table_sql) or die(mysqli_error($conn));
        $check_number_in_table_row_number = mysqli_num_rows($check_number_in_table_result);
        $check_number_in_table_row = mysqli_fetch_assoc($check_number_in_table_result);

        if($check_number_in_table_row_number == 0)
        {
            echo json_encode(array('message' => 'Email not found'));
            exit();
        }

        else if($check_number_in_table_row_number == 1)
        {
            $otp_in_table = $check_number_in_table_row['otp'];
            $expiry_in_table = $check_number_in_table_row['expiry'];

            date_default_timezone_set("Asia/Kolkata");
            $now = date("Y-m-d H:i:s", strtotime("now"));
            
            if($otp_in_table == $entered_otp)
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
                echo json_encode(array('message' => 'OTP incorrect'));
                exit();
            }
        }
    }
?>