<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $number = $data['number'];
    $category = $data['category'];

    if($number == NULL || $number == "")
    {
        echo json_encode(array('message' => 'Number is required'));
        exit();
    }

    else
    {

        $otp = mt_rand(1000,9999);

        date_default_timezone_set("Asia/Kolkata");
        $now = date("Y-m-d H:i:s", strtotime("now"));
        $minutes = date("Y-m-d H:i:s", strtotime("now + 5 minutes"));

        $insert_otp_sql = "INSERT INTO `freelancer_otp_number` (`number`, `otp`, `category`, `generation`, `expiry`) VALUES ('$number', '$otp', '$category', '$now', '$minutes')";
        $insert_otp_result = mysqli_query($conn, $insert_otp_sql) or die(mysqli_error($conn));

        $get_otp_sql = "SELECT * FROM `freelancer_otp_number` WHERE `number` = '$number' ORDER BY `id` DESC LIMIT 1";
        $get_otp_result = mysqli_query($conn, $get_otp_sql) or die(mysqli_error($conn));
        $get_otp_row = mysqli_fetch_assoc($get_otp_result);

        $otp = $get_otp_row['otp'];
        $generation = $get_otp_row['generation'];
        $expiry = $get_otp_row['expiry'];

        $apikey = "pxINVBzPwnZL9TNd";
        $senderid = "BLUPEN";
        $templateid = "1707168899264351754";

        // $message = "Your one-time password is $otp. Please proceed with this One Time Password (OTP) within the next 5 minutes. Thank you, Team Bluepen";
        $message = "Your one-time password to Signup with Bluepen is $otp. Please proceed with this One Time Password (OTP) within the next 5 minutes. \n Thank you, \n Team Bluepen";
        $message = urlencode($message);

        $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
        
        // $output = file_get_contents($url);	/*default function for push any url*/

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300, 
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $output = curl_exec($curl);
        $err = curl_error($curl);

        $update_output_sql = "UPDATE `freelancer_otp_number` SET `output` = '$output' WHERE `id` = '$get_otp_row[id]'";
        $update_output_result = mysqli_query($conn, $update_output_sql) or die(mysqli_error($conn));

        $output = json_decode($output);
        
        $otp_data = array(
            'number' => $number,
            'otp' => $otp,
            'generation' => $generation,
            'expiry' => $expiry,
            'status' => 200,
            'data' => $data,
            'output' => $output,
            // 'url' => $url,
        );

        echo json_encode($otp_data);
    }
    
?>