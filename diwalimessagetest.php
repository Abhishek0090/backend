<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    // include '../connect.php';

    // $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];
    $number = "9004185304";
    $name = "Kaushik";

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707169953228815246";

    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);

    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    
    $output = file_get_contents($url);	/*default function for push any url*/
    // $update_output_sql = "UPDATE `student_otp_number` SET `output` = '$output' WHERE `id` = '$get_otp_row[id]'";
    // $update_output_result = mysqli_query($conn, $update_output_sql) or die(mysqli_error($conn));

    // $output = json_decode($output);

    $otp_data = array(
        'number' => $number,
        // 'otp' => $otp,
        // 'generation' => $generation,
        // 'expiry' => $expiry,
        'status' => 200,
        // 'data' => $data,
        'output' => $output
    );

    echo json_encode($otp_data);

?>