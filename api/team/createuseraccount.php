<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // echo json_encode($data);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $country_name = $data['country_name'];
    $country_code = $data['country_code'];
    $number = $data['number'];
    $address = $data['address'];
    $university = $data['university'];
    $course = $data['course'];
    $accepted = $data['accepted'];
    // $password = $data['password'];
    $creator = $data['creator'];
    $utm_data = $data['utm_data'];
    $utm_data = json_encode($utm_data);

    $check_if_email_registered = "SELECT * FROM `users` WHERE `email` = '$email'";
    $check_if_email_registered_result = mysqli_query($conn, $check_if_email_registered);
    $check_if_email_registered_row_number = mysqli_num_rows($check_if_email_registered_result);
    $check_if_email_registered_row = mysqli_fetch_assoc($check_if_email_registered_result);

    $check_if_number_registered = "SELECT * FROM `users` WHERE `number` = '$number'";
    $check_if_number_registered_result = mysqli_query($conn, $check_if_number_registered);
    $check_if_number_registered_row_number = mysqli_num_rows($check_if_number_registered_result);
    $check_if_number_registered_row = mysqli_fetch_assoc($check_if_number_registered_result);

    // $check_if_email_registered_row_number = 0;
    // $check_if_number_registered_row_number = 0;
    
    if($check_if_email_registered_row_number != 0)
    {
        $response = array(
            'status' => 'error',
            'message' => 'Email already registered'
        );
        echo json_encode($response);
    }

    else if($check_if_number_registered_row_number != 0)
    {
        $response = array(
            'status' => 'error',
            'message' => 'Number already registered'
        );
        echo json_encode($response);
    }

    else
    {

        date_default_timezone_set("Asia/Kolkata");
        $now = date("d-m-Y", strtotime("now"));

        $university = str_replace("'", "''", $university);
        $course = str_replace("'", "''", $course);

        $password = "bluepen";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_user_sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `address`, `university`, `course`, `is_accepted`, `signin_method`, `password`, `wallet`, `date_of_birth`, `created`, `agreed`, `utm_data`)
        VALUES ('$firstname', '$lastname', '$email', '0', '$country_name', '$country_code', '$number', '0', '$address', '$university', '$course',  1, 'manual_by_$creator', '$hashed_password', 100, '$now', now(), '0', '$utm_data')";
        $insert_user_result = mysqli_query($conn, $insert_user_sql) or die(mysqli_error($conn));

        // echo json_encode(array(
        //     'status' => 'success',
        //     "insert_sql" => $insert_user_sql,
        //     'message' => 'User registered successfully, password is '.$password,
        //     'user_data' => $data
        // ));

        $get_user_sql = "SELECT * FROM `users` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 1";
        $get_user_result = mysqli_query($conn, $get_user_sql) or die(mysqli_error($conn));
        $get_user_row = mysqli_fetch_assoc($get_user_result);

        $id = $get_user_row['id'];
        $firstname = $get_user_row['firstname'];
        $lastname = $get_user_row['lastname'];
        $email = $get_user_row['email'];
        $country = $get_user_row['country'];
        $number = $get_user_row['number'];
        $db_password = $get_user_row['password'];
        $address = $get_user_row['address'];

        $to_update_password = "bluepen".$id;
        $new_hashed_password = password_hash($to_update_password, PASSWORD_DEFAULT);

        $update_password_sql = "UPDATE `users` SET `password` = '$new_hashed_password' WHERE `id` = '$id'";
        $update_password_result = mysqli_query($conn, $update_password_sql);

        $user_data = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'country_name' => $country_name,
            'country_code' => $country_code,
            'number' => $number,
            // 'to_update_password' => $to_update_password,
            // 'new_hashed_password' => $new_hashed_password,
            'address' => $address
        );

        // $response = array(
        //     'status' => 'success',
        //     'message' => 'User registered successfully, password is '.$to_update_password,
        //     'user_data' => $user_data
        // );

        mailer1($id, $email, $firstname, $lastname, $to_update_password);
        exit();
    }

    // echo json_encode($response);

    function mailer1($id, $email, $firstname, $lastname, $password)
    {
        $to = $email;

        $output='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
            <head>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="x-apple-disable-message-reformatting" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title></title>
                <style type="text/css" rel="stylesheet" media="all">
                /* Base ------------------------------ */
                
                @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
                body {
                    width: 100% !important;
                    height: 100%;
                    margin: 0;
                    -webkit-text-size-adjust: none;
                }
                
                a {
                    color: #3869D4;
                }
                
                a img {
                    border: none;
                }
                
                
                
                .preheader {
                    display: none !important;
                    visibility: hidden;
                    mso-hide: all;
                    font-size: 1px;
                    line-height: 1px;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                }
                /* Type ------------------------------ */
                
                body,
                th {
                    font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                }
                
                h1 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 22px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h2 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h3 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: left;
                }
                
                td,
                th {
                    font-size: 16px;
                }
                
                p,
                ul,
                ol,
                blockquote {
                    margin: .4em 0 1.1875em;
                    font-size: 16px;
                    line-height: 1.625;
                }
                
                p.sub {
                    font-size: 13px;
                }
                /* Utilities ------------------------------ */
                
                .align-right {
                    text-align: right;
                }
                
                .align-left {
                    text-align: left;
                }
                
                .align-center {
                    text-align: center;
                }
                /* Buttons ------------------------------ */
                
                .button {
                    background-color: #3869D4;
                    border-top: 10px solid #3869D4;
                    border-right: 18px solid #3869D4;
                    border-bottom: 10px solid #3869D4;
                    border-left: 18px solid #3869D4;
                    display: inline-block;
                    color: #FFF;
                    text-decoration: none;
                    border-radius: 3px;
                    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                    -webkit-text-size-adjust: none;
                    box-sizing: border-box;
                }
                
                .button--green {
                    background-color: #22BC66;
                    border-top: 10px solid #22BC66;
                    border-right: 18px solid #22BC66;
                    border-bottom: 10px solid #22BC66;
                    border-left: 18px solid #22BC66;
                }
                
                .button--yellow {
                    background-color: #FFCC33;
                    border-top: 10px solid #FFCC33;
                    border-right: 18px solid #FFCC33;
                    border-bottom: 10px solid #FFCC33;
                    border-left: 18px solid #FFCC33;
                }

                .button--red {
                    background-color: #FF6136;
                    border-top: 10px solid #FF6136;
                    border-right: 18px solid #FF6136;
                    border-bottom: 10px solid #FF6136;
                    border-left: 18px solid #FF6136;
                }
                
                @media only screen and (max-width: 500px) {
                    .button {
                    width: 100% !important;
                    text-align: center !important;
                    }
                }
                /* Attribute list ------------------------------ */
                
                .attributes {
                    margin: 0 0 21px;
                }
                
                .attributes_content {
                    background-color: #F4F4F7;
                    padding: 16px;
                }
                
                .attributes_item {
                    padding: 0;
                }
                /* Related Items ------------------------------ */
                
                .related {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .related_item {
                    padding: 10px 0;
                    color: #CBCCCF;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .related_item-title {
                    display: block;
                    margin: .5em 0 0;
                }
                
                .related_item-thumb {
                    display: block;
                    padding-bottom: 10px;
                }
                
                .related_heading {
                    border-top: 1px solid #CBCCCF;
                    text-align: center;
                    padding: 25px 0 10px;
                }
                /* Discount Code ------------------------------ */
                
                .discount {
                    width: 100%;
                    margin: 0;
                    padding: 24px;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #F4F4F7;
                    border: 2px dashed #CBCCCF;
                }
                
                .discount_heading {
                    text-align: center;
                }
                
                .discount_body {
                    text-align: center;
                    font-size: 15px;
                }
                /* Social Icons ------------------------------ */
                
                .social {
                    width: auto;
                }
                
                .social td {
                    padding: 0;
                    width: auto;
                }
                
                .social_icon {
                    height: 20px;
                    margin: 0 8px 10px 8px;
                    padding: 0;
                }
                /* Data table ------------------------------ */
                
                .purchase {
                    width: 100%;
                    margin: 0;
                    padding: 35px 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_content {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_item {
                    padding: 10px 0;
                    color: #51545E;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .purchase_heading {
                    padding-bottom: 8px;
                    border-bottom: 1px solid #EAEAEC;
                }
                
                .purchase_heading p {
                    margin: 0;
                    color: #85878E;
                    font-size: 12px;
                }
                
                .purchase_footer {
                    padding-top: 15px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .purchase_total {
                    margin: 0;
                    text-align: right;
                    font-weight: bold;
                    color: #333333;
                }
                
                .purchase_total--label {
                    padding: 0 15px 0 0;
                }
                
                body {
                    background-color: #F4F4F7;
                    color: #51545E;
                }
                
                p {
                    color: #51545E;
                }
                
                p.sub {
                    color: #6B6E76;
                }
                
                .email-wrapper {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFCC33;
                }
                
                .email-content {
                    width: 100%;
                    margin: 0;
                    padding: 0;
            
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                /* Masthead ----------------------- */
                
                .email-masthead {
                    padding: 25px 0;
                    text-align: center;
                }
                
                .email-masthead_logo {
                    width: 94px;
                }
                
                .email-masthead_name {
                    font-size: 16px;
                    font-weight: bold;
                    color: #A8AAAF;
                    text-decoration: none;
                    text-shadow: 0 1px 0 white;
                }
                /* Body ------------------------------ */
                
                .email-body {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFFFFF;
                }
                
                .email-body_inner {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFFFFF;
                }
                
                .email-footer {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                    backgound-color: #ffcc33;
                }
                
                .email-footer p {
                    color: black;
                }
                
                .body-action {
                    width: 100%;
                    margin: 30px auto;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                }
                
                .body-sub {
                    margin-top: 25px;
                    padding-top: 25px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .content-cell {
                    padding: 35px;
                }
                /*Media Queries ------------------------------ */
                
                @media only screen and (max-width: 600px) {
                    .email-body_inner,
                    .email-footer {
                    width: 100% !important;
                    }
                }
                
                @media (prefers-color-scheme: dark) {
                    body,
                    .email-body,
                    .email-body_inner,
                    .email-content,
                    .email-wrapper,
                    .email-masthead,
                    .email-footer {
                    background-color: #333333 !important;
                    color: #FFF !important;
                    }
                    p,
                    ul,
                    ol,
                    blockquote,
                    h1,
                    h2,
                    h3 {
                    color: #FFF !important;
                    }
                    .attributes_content,
                    .discount {
                    background-color: #222 !important;
                    }
                    .email-masthead_name {
                    text-shadow: none !important;
                    }
                }
                </style>
                <!--[if mso]>
                <style type="text/css">
                    .f-fallback  {
                    font-family: Arial, sans-serif;
                    }
                </style>
                <![endif]-->
            </head>
            <body>
            <table style="width:100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr style="background-color:#FFCc33">
                    <th align="center" width="auto" style="padding: 15px;">
                        <a href="https://bluepen.co.in" class="">
                        <img src="https://bluepen.co.in/images/logo.png" title="" style="width:120px; height:auto"/>
                        </a>
                    </th>
                    
                    
                </tr>
                
            </table>
                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                    <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    
                        
                        
                        <!-- Email Body -->
                        <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                <div class="f-fallback">
                                    <h1>Hi, '.$firstname.' ' . $lastname . '</h1>
                                    <p>Your account has been successfully created on Bluepen. You can use the given below login credentials to login to your account
                                        <br>Username: '.$email.'
                                        <br>Password: '.$password.'
                                            <div class="text-center">
                                                <a href="https://bluepen.co.in/auth/login" class="button button--yellow" style="text-decoration: none; color: #FFFFFF;">Login</a>
                                            </div>
                                        <br>Please note that for security reasons, we recommend changing your password upon your first login. You can do this by navigating to your account settings.
                                        <br>For any queries, please contact us at <a href="mailto:contact@bluepen.co.in">Support Email</a> or <a href="tel:+919619305482">Support Number</a>
                                    </p>
                                    <p>Thanks,
                                        <br>Team Bluepen</p>
                                        <!-- Sub copy -->
                                        <table class="body-sub" role="presentation">
                                        
                                        </table>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                <td class="content-cell" align="center">
                    <p class="f-fallback sub align-center">&copy; 2020 Blue Pen . All rights reserved.</p>
                                    
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    </table>
                </body>
            </html>';
        
        $subject = "Bluepen Account Created 🎉🎊";
        
        $body = $output; 

        $data = array(
            "sender" => array(
                "email" => 'no-reply@bluepen.co.in',
                "name" => 'Bluepen',
            ),
            "to" => array(
                array(
                    "email" => $to,
                    "name" => $firstname . ' ' . $lastname
                )
            ),
            "subject" => $subject,
            "htmlContent" => $body
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.brevo.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: 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';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        
        if (curl_error($ch))
        {
            echo 'Error:' . curl_error($ch);
            // echo json_encode(array(
            //     'message' => 'Assignment assigned but mail not sent', 
            //     'status' => 200,
            //     'error' => 'Error:' . curl_error($ch),
            //     'result' => $result,
            // ));
            echo json_encode(array(
                'status' => 'success',
                'message' => 'User registered successfully but mail not sent, user id is '.$id,
                'error' => 'Error:' . curl_error($ch),
                'result' => $result,
            ));
        }
        else
        {
            // echo json_encode(array(
            //     'message' => 'Assignment assigned and mail sent', 
            //     'status' => 200,
            //     'result' => $result,
            // ));
            echo json_encode(array(
                'status' => 'success',
                'message' => 'User registered successfully and mail sent, user id is '.$id,
                // 'error' => 'Error:' . curl_error($ch),
                // 'result' => $result,
            ));
        }
        curl_close($ch);
    }

?>