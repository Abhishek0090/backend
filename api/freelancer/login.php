<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];
    $password = $data['password'];

    // check if email registered in database
        // if yes check approval status
            // if approved check password
                // if password correct then login
                    // return freelancer id along with status
                // else return wrong password
            // else return not approved
        // else return not registered
    // else return not registered

    $freelancer_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$email'";
    $freelancer_result = mysqli_query($conn, $freelancer_sql);
    $freelancer_data = mysqli_fetch_assoc($freelancer_result);
    $freelancer_count = mysqli_num_rows($freelancer_result);
    $freelancer_id = $freelancer_data['id'];

    $message = "";
    $is_technical = 0;
    $is_non_technical = 0;
    $is_writer = 0;

    if($freelancer_count == 1)
    {
        // freelancer present in system
        $approval_status = $freelancer_data['is_approved'];
        if($freelancer_data['technical_is_approved'] == 1)
        {
            $approval_status = 1;
            $role = "technical";
        }
        else if($freelancer_data['non_technical_is_approved'] == 1)
        {
            $approval_status = 1;
            $role = "non_technical";
        }
        else if($freelancer_data['writer_is_approved'] == 1)
        {
            $approval_status = 1;
            $role = "writer";
        }
        else
        {
            $approval_status = 0;
        }

        if($approval_status == 1)
        {
            // freelancer approved
            $password_check = password_verify($password, $freelancer_data['password']);
            if($password_check == TRUE)
            {
                // login and return roles
                $message = "Login successful";
                $status = 200;
                
                $headers = array('alg'=>'HS256','typ'=>'JWT');
                $login_data = array(
                    'id' => $freelancer_id,
                    'role' => $role,
                );

                $jwt = generate_jwt($headers, $login_data);
                // $freelancer_id = $freelancer_data['id'];
                // $is_technical = $freelancer_data['technical'];
                // $is_non_technical = $freelancer_data['non technical'];
                // $is_writer = $freelancer_data['writer'];
            }
            else
            {
                $message = "Wrong password";
            }
        }
        else
        {
            $message = "Please wait for approval";
        }
    }
    else
    {
        $message = "Please register as a freelancer first";
    }

    echo json_encode(array(
        'message' => $message,
        'approval status' => $approval_status,
        'freelancer_id' => $freelancer_id,
        'role' => "freelancer",
        'domain' => $role,
        'token' => $jwt,
        'status' => $status,
        // 'is_technical' => $is_technical,
        // 'is_non_technical' => $is_non_technical,
        // 'is_writer' => $is_writer,
        // 'freelancer_sql' => $freelancer_sql,
        // 'technical_is_approved' => $freelancer_data['technical_is_approved'],
        // 'non_technical_is_approved' => $freelancer_data['non_technical_is_approved'],
        // 'writer_is_approved' => $freelancer_data['writer_is_approved'],
        // 'data' => $data,
    ));

    function generate_jwt($headers, $payload, $secret = 'secret')
    {
        $headers_encoded = base64url_encode(json_encode($headers));
        
        $payload_encoded = base64url_encode(json_encode($payload));
        
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = base64url_encode($signature);
        
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        
        return $jwt;
    }
    
    function base64url_encode($str)
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
?>