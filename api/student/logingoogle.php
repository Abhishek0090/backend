<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: *");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];

    if (empty($email))
    {
        echo json_encode(['message' => 'Please enter email', 'status' => false]);
    }

    else
    {
        $get_user_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $get_user_result = mysqli_query($conn, $get_user_sql) or die(mysqli_error($conn));
        $get_user_row_number = mysqli_num_rows($get_user_result);
        $get_user_row = mysqli_fetch_assoc($get_user_result);

        if($get_user_row_number == 0)
        {
            echo json_encode(['message' => 'Email not registered', 'status' => false]);
            exit();
        }

        else
        {
            $id = $get_user_row['id'];
            $firstname = $get_user_row['firstname'];
            $lastname = $get_user_row['lastname'];
            $email = $get_user_row['email'];
            $number = $get_user_row['number'];

            $user_data = array(
                'id' => $id,
                // 'firstname' => $firstname,
                // 'lastname' => $lastname,
                // 'email' => $email,
                "exp" => (time() + 3600)
            );

            $headers = array('alg'=>'HS256','typ'=>'JWT');
            
            $jwt = generate_jwt($headers, $user_data);

            $data = array(
                "token" => $jwt,
                "id" => $id,
                "message" => "Login Successful",
                // "firstname" => $firstname,
                // "lastname" => $lastname,
                // "email" => $email,
                // "number" => $number,
                "code" => 93,
                "status" => 200
            );

            echo json_encode($data);
        }

    }

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