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

    if (empty($email) || empty($password))
    {
        echo json_encode(['msg' => 'Please fill in both the fields', 'status' => false]);
        $message = "Please fill in both the fields";
        $status = FALSE;
    }

    else
    {
        $get_user_sql = "SELECT * FROM `team` WHERE `email` = '$email'";
        $get_user_result = mysqli_query($conn, $get_user_sql) or die(mysqli_error($conn));
        $get_user_row_number = mysqli_num_rows($get_user_result);
        $get_user_row = mysqli_fetch_assoc($get_user_result);
        $domain = $get_user_row['role'];
        $is_technical = $get_user_row['is_technical'];
        $is_non_technical = $get_user_row['is_non_technical'];

        if($domain == 'pm' || $domain == 'hr')
        {
            if($is_technical == 1)
            {
                $domain = 'Technical '.$domain;
            }

            else if($is_non_technical == 1)
            {
                $domain = 'Non-Technical '.$domain;
            }
        }
        else if($domain == "bh")
        {
            $domain = 'Brainheaters';
        }
        else
        {
            $domain = 'Admin';
        }

        if($get_user_row_number == 0)
        {
            echo json_encode(['msg' => 'Email not registered', 'status' => false]);
            $message = "Email not registered";
            $status = FALSE;
        }

        else
        {
            $password_check = password_verify($password, $get_user_row['password']);

            if($password_check == false)
            {
                echo json_encode(['msg' => 'Incorrect password', 'status' => false]);
                $message = "Incorrect password";
                $status = FALSE;
            }

            else if($password_check == true)
            {
                $message = "Login successful";
                $status = TRUE;

                $id = $get_user_row['id'];
                $name = $get_user_row['name'];
                // $lastname = $get_user_row['lastname'];
                $email = $get_user_row['email'];

                $user_data = array(
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    "exp" => (time() + 3600)
                );

                $headers = array('alg'=>'HS256','typ'=>'JWT');
                
                $jwt = generate_jwt($headers, $user_data);

                // $data = array(
                //     "jwt" => $jwt,
                // );

                // echo json_encode($data);
            }
        }
    }

    echo json_encode(array(
        "message" => $message,
        "status" => $status,
        "data" => $data,
        "user_data" => $user_data,
        "id" => $id,
        "role" => "team",
        "domain" => $domain,
        "token" => $jwt,
        "is_technical" => $is_technical,
        "is_non_technical" => $is_non_technical
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