<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // $data = json_decode(file_get_contents("php://input"), true);
    // $token = $data['token'];
    // $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
    // $user_id = $jwt['id'];
    
    $user_id = $_GET['id'];

    $get_contact_details_sql = "SELECT * FROM `user_bought_writer` WHERE user_id = '$user_id' ORDER BY id DESC";
    $get_contact_details_result = mysqli_query($conn, $get_contact_details_sql);
    $get_contact_details_count = mysqli_num_rows($get_contact_details_result);
    
    if($get_contact_details_count == 0)
    {
        $response = array(
            'status' => 'error',
            'message' => 'No contacts found'
        );
    }
    
    else
    {
        $response = array();
        while($get_contact_details_data = mysqli_fetch_assoc($get_contact_details_result))
        {
            $writer_id = $get_contact_details_data['writer_id'];

            $get_writer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$writer_id'";
            $get_writer_details_result = mysqli_query($conn, $get_writer_details_sql);
            $get_writer_details_data = mysqli_fetch_assoc($get_writer_details_result);
            
            date_default_timezone_set('Asia/Kolkata');
            $now = date('Y-m-d H:i:s');
            $expiry = $get_contact_details_data['expires_on'];

            if($now < $expiry)
            {
                $writer_map = array(
                    'id' => $get_writer_details_data['id'],
                    'name' => $get_writer_details_data['firstname'],
                    'email' => $get_writer_details_data['email'],
                    'country_name' => $get_writer_details_data['country_name'],
                    'country_code' => $get_writer_details_data['country_code'],
                    'number' => $get_writer_details_data['number'],
                    'whatsapp' => $get_writer_details_data['whatsapp'],
                    'now' => $now,
                    'expiry' => $expiry,
                );
                array_push($response, $writer_map);
            }
        }
    }
    
    echo json_encode($response);

?>