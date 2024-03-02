<?php

    // Headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Credentials' => true,");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $country_name = $data['country_name'];
    $country_code = $data['country_code'];
    $number = $data['number'];
    $address = $data['address'];
    $affiliate_code_used = $data['affiliate_code_used'];
    $accepted = $data['accepted'];
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

    

    if($check_if_email_registered_row_number != 0)
    {
        $response = array(
            'status' => 'error',
            'message' => 'Email already registered'
        );
    }

    else if($check_if_number_registered_row_number != 0)
    {
        $response = array(
            'status' => 'error',
            'message' => 'Number already registered'
        );
        

    }

    else
    {
        $get_affiliate_user_details = "SELECT * FROM `users` WHERE `affiliate_code` = '$affiliate_code_used'";
        $get_affiliate_user_details_result = mysqli_query($conn, $get_affiliate_user_details);
        $get_affiliate_user_details_row_number = mysqli_num_rows($get_affiliate_user_details_result);
        if($get_affiliate_user_details_row_number == 1)
        {
            $get_affiliate_user_details_row = mysqli_fetch_assoc($get_affiliate_user_details_result);
            $affiliate_user_id = $get_affiliate_user_details_row['id'];
        }
        else
        {
            $affiliate_user_id = -1;
        }

        if(ctype_alpha($firstname[0]) && ctype_alpha($lastname[0]))
        {
            // generate code BLUEBH1989 (B and H are from first name and lastname)
            $affiliate_code = 'BLUE'.strtoupper(substr($firstname, 0, 1)).strtoupper(substr($lastname, 0, 1));
        }
        else if(ctype_alpha($firstname[0]) && !ctype_alpha($lastname[0]))
        {
            // generate code BLUEBP1989 (B is from firstname and P is from bluepen)
            $affiliate_code = 'BLUE'.strtoupper(substr($firstname, 0, 1)).'P';
        }
        else if(!ctype_alpha($firstname[0]) && ctype_alpha($lastname[0]))
        {
            // generate code BLUEH1989 (B is from bluepen and H is from lastname)
            $affiliate_code = 'BLUEB'.strtoupper(substr($lastname, 0, 1));
        }
        else if(!ctype_alpha($firstname[0]) && !ctype_alpha($lastname[0]))
        {
            // generate code BLUE1989 (B and P are from bluepen)
            $affiliate_code = 'BLUEBP';
        }
        
        $random_number = rand(1000, 9999);
        $affiliate_code = $affiliate_code.$random_number;
        
        $check_affiliate_code_sql = "SELECT * FROM users WHERE affiliate_code = '$affiliate_code'";
        $check_affiliate_code_result = mysqli_query($conn, $check_affiliate_code_sql);
        while(mysqli_num_rows($check_affiliate_code_result) > 0)
        {
            $random_number = rand(1000, 9999);
            $affiliate_code = $affiliate_code.$random_number;

            // Check if the new affiliate code exists in the database
            $check_affiliate_code_sql = "SELECT * FROM `users` WHERE `affiliate_code` = '$affiliate_code'";
            $check_affiliate_code_result = mysqli_query($conn, $check_affiliate_code_sql);
        }

        date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y", strtotime("now"));

        $insert_user_sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `address`, `affiliate_code`, `is_accepted`, `signin_method`, `password`, `affiliate_code_used`, `affiliate_code_by`, `wallet`, `date_of_birth`, `created`, `agreed`, `utm_data`)
        VALUES ('$firstname', '$lastname', '$email', '1', '$country_name', '$country_code', '$number', '0', '$address', '$affiliate_code', 1, 'google', '', '$affiliate_code_used', '$affiliate_user_id', 100, '$now', now(), '1', '$utm_data')";
        $insert_user_result = mysqli_query($conn, $insert_user_sql) or die(mysqli_error($conn));

        $get_user_sql = "SELECT * FROM `users` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 1";
        $get_user_result = mysqli_query($conn, $get_user_sql) or die(mysqli_error($conn));
        $get_user_row = mysqli_fetch_assoc($get_user_result);

        $id = $get_user_row['id'];
        $firstname = $get_user_row['firstname'];
        $lastname = $get_user_row['lastname'];
        $email = $get_user_row['email'];
        $country = $get_user_row['country'];
        $number = $get_user_row['number'];
        $address = $get_user_row['address'];

        $user_data = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'country_name' => $country_name,
            'country_code' => $country_code,
            'number' => $number,
            'address' => $address,
            'affiliate_code' => $affiliate_code,
            'insert_sql' => $insert_user_sql,
        );

        $response = array(
            'status' => 'success',
            'message' => 'User registered successfully',
            'user_data' => $user_data,
            'status' => 200
        );
        
    }
    echo json_encode($response);

    $to = $email;

    $output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                        <img src="https://bluepen.co.in/images/logo.png"  title="" style="width:120px; height:auto"/>
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
                                    <h1>Hi, ' . $firstname . ' ' . $lastname . '</h1>
                                    <p>Your <strong>Bluepen</strong> account is now complete and ready for use</p>
                                    <p><strong>Your User ID is: ' . $id . ' </strong></p>
                                    <p><strong>Country: ' . $country . ' </strong></p>
                                    <p><strong>Mobile Number : ' . $contact . ' </strong></p>
                                    <p><strong>Full Address : ' . $address . '</strong></p>
                                    <br>
                                    <p>We have also added 20 coins in your wallet which you can use to contact writers for your hand-written, drawing, technical drawing and art assignments.</p>
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
            $subject = "Welcome- BluePen";
            $body = $output;
            require_once "../mailer/PHPMailer/PHPMailer.php";
            require_once "../mailer/PHPMailer/SMTP.php";
            require_once "../mailer/PHPMailer/Exception.php";
            $mail = new PHPMailer;
            $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
            $mail->Host = 'mail.bluepen.co.in';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail->Port = '465';                                //Sets the default SMTP server port
            $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->Username = 'no-reply@bluepen.co.in';                    //Sets SMTP username
            $mail->Password = 'gyaankabhandaar100';                    //Sets SMTP password
            $mail->SMTPSecure = 'ssl';
            // $mail->SMTPDebug = 1;							//Sets connection prefix. Options are "", "ssl" or "tls"
            // $mail->From = 'kaushiknathagami14@gmail.com';					//Sets the From email address for the message
            // $mail->FromName = 'BluePen';				//Sets the From name of the message
            $mail->setFrom('no-reply@bluepen.co.in', 'Welcome to Bluepen');
            // $mail->Sender = 'no-reply@bluepen.co.in';
            $mail->AddAddress($to, '');        //Adds a "To" address
            // $mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
            $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
            $mail->IsHTML(true);                            //Sets message type to HTML				
            $mail->Subject = $subject;                //Sets the Subject of the message
            $mail->Body = $body;                //An HTML or plain text message body
            $mail->DKIM_domain = "bluepen.co.in";
            $mail->DKIM_private = "MIIEpQIBAAKCAQEAyFiJHzoagEmVG+v1QIF6WDWbl8GxeglRcVPtGFkXFbrCwgIi9sSi3YqQG41Dah29tA4d5vk7P/Eh1Drm0IJ/ULoL9MAaXWUgi8uYniw5AP1l4/KmeGT3dNi+b/tNNf5n8G2JlPga4Yrdmaf3aXAkwXwnUqMZLyqS8tO32RgD80hEZo2xVikQcnxYevdad5fNhrFBq05V15l6UVwVsjG/cMEdzPffTvz1G2PcO3XyknureoLHV3e0So4a7ZtAQdyrSWUMbiZQdIfww3M9SpO969qW7LfMjVIYS1hrppoab7+DTbihBc5q3RO3NSSGZ0LSnx2IrgBNcI4Lszlj9WRnIQIDAQABAoIBAGCBjWPWaEedqk7t5ZCyDg4JnK6IZgZkELAnflE5MQ6NjR1JTDBUXiObiHlNHckzFFt0ZWEKc0kEzYfe66pLAisPw4ydMNYGTZwpcZXXtYnNhlQ8YYYjFLRbZ7inc/TrXIQLL7frn38/lilbKKnIlFwDgymiWRJITsrbw3a2w8hfD/QpehsoJGoUa8nHx/IpvRhbK6iay7ZhGzCtYuJcjmNtu830XON21wJme3gAn10RtAPtmXPzh2V6bQSCMWEzFAhggnuTyBffiQE/bwOUC6jEX1Wo6ViDQMpmNOvtL7H8QNwk6NGoGShyUoZCKe0/88P2OPkdlTRX7P3+QXU5BsECgYEA7OskEiLzZEWpAJ4sDZ5l6xQ4aOR+d1r+54RoP55r4/eo7/kLDqeKIzT555Rg76PNWPvXO3l2MPbJBHO8cEEQqgmGb7H0ha03YXiWRhK95A3ULIl89Wlx+fOX9cNug56l1ycniUf+r0Mg4ibh0oZT9fuWlbTaZthfWQmnjPMZYokCgYEA2HtT99Qkq8akgWNewq8YJuNh+HYOgp/CPTe2vJ/bKYpmBpDFcB1/JGCCrHPMcnootLd4X8PJ+FnxQ0ewVNQ3f7N0On/Tyu1mCsPjxGfXagjXa/wgkQQp3pMektHrzAUfEPxPvabKQKMG6TG9rW/DAc/otNA1TC3kz+N//OIcmdkCgYEAmQCyZtQTg2pJXpDHunPVNh/03ijSU5p8jF/CQ3O4EZ1biL65GVmxqFMKITh98cVDVHgv48TpQ23dG/bydzxN2sIUBAZU+A+JeHU79z0bTTBxGeIgxQy4AsgCF0GDGZVXXL94lPvdyqn7jpG1vRPrHSzBbyVA9rI9wW6uuiQ0/KECgYEAgip1rLiEbDz+wUXsvoblsMxcJjdmNii1dHXBjN1ZvDqZai02allyD39wUx01u0e0niULXhmtoYUDSn8aiYco78IJivs9b/EawDJVC82cewdh8G4jbs7gFhLD+Wf7risOKPptQA2/4umjyCe+c0CWMsq+k6n1wh5+THnwhS+4HtECgYEAnykgbhZEpnC7FFO+I25+RsUSk9BWu4agufX/aaaPm6RMg6NIVF78yyaiaTFA78tLas+XPNmoeRI1u2ZV9kwTxvWGiSImEpvxVKfd/xkQuNtDMsNJpiqpRTdmz7kJ+MaUDuOvWGBKiabFQdh9ik4jiF7HOadRDrM38Bf9uawjm6g=";
            $mail->DKIM_selector = 'phpmailer';
            $mail->DKIM_passphrase = '';

            // $mail->DKIM_identity = 
            // $mail->From = $mail->Username;
            // $mail->From('me@example.com'); //Your own email address
            // $mail->addReplyTo($_POST['email']);
            // if ($mail->Send())                                //Send an Email. Return true on success or false on error
            // {
            //     // header("Location: ../login.php?signup=successfinal");
            //     // exit();
            //     // var_dump("mail sent");
            //     $response = array(
            //         'status' => 'success',
            //         'message' => 'User registered successfully and mail sent',
            //         'user_data' => $user_data
            //     );
            //     echo json_encode($response);
            // }
            // else
            // {
            //     // header("Location: ../signup.php?signup=error");
            //     // exit();
            //     // var_dump("mail not sent");
            //     $response = array(
            //         'status' => 'success',
            //         'message' => 'User registered successfully but mail not sent',
            //         'user_data' => $user_data
            //     );
            //     echo json_encode($response);
            // }
?>