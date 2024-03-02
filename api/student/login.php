<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // 87 for manual signin
    // 93 for google signin

    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];
    $password = $data['password'];

    if (empty($email) || empty($password))
    {
        echo json_encode(['message' => 'Please fill in both the fields', 'status' => 400]);
    }

    else
    {
        $get_user_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $get_user_result = mysqli_query($conn, $get_user_sql) or die(mysqli_error($conn));
        $get_user_row_number = mysqli_num_rows($get_user_result);
        $get_user_row = mysqli_fetch_assoc($get_user_result);

        if($get_user_row_number == 0)
        {
            echo json_encode(['message' => 'Email not registered', 'status' => 400]);
            exit();
        }

        else
        {
            if($get_user_row['signin_method'] == "google")
            {
                echo json_encode(['message' => 'You have signed up using Google Signup. Please use the same to log in', 'status' => false]);
            }
            else
            {
                $password_check = password_verify($password, $get_user_row['password']);

                if($password_check == false)
                {
                    echo json_encode(['message' => 'Incorrect password', 'status' => 400]);
                }

                else if($password_check == true)
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
                        "message" => "Login successful",
                        "code" => 87,
                        "status" => 200
                    );

                    echo json_encode($data);
                }
            }
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