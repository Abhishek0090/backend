<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'];
    // $email_data = explode(",", $email);
    

    if($email == NULL || $email == "")
    {
        echo json_encode(array('message' => 'Email is required'));
        exit();
    }

    else
    {

        $otp = mt_rand(1000,9999);

        date_default_timezone_set("Asia/Kolkata");
        $now = date("Y-m-d H:i:s", strtotime("now"));
        $minutes = date("Y-m-d H:i:s", strtotime("now + 5 minutes"));

        $insert_otp_sql = "INSERT INTO `student_otp_email` (`email`, `otp`, `generation`, `expiry`) VALUES ('$email', '$otp', '$now', '$minutes')";
        $insert_otp_result = mysqli_query($conn, $insert_otp_sql) or die(mysqli_error($conn));

        $get_otp_sql = "SELECT * FROM `student_otp_email` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 1";
        $get_otp_result = mysqli_query($conn, $get_otp_sql) or die(mysqli_error($conn));
        $get_otp_row = mysqli_fetch_assoc($get_otp_result);

        $otp = $get_otp_row['otp'];
        $generation = $get_otp_row['generation'];
        $expiry = $get_otp_row['expiry'];

        $otp_data = array(
            'data' => $data,
            'status' => 200,
            'otp' => $otp,
            'generation' => $generation,
            'expiry' => $expiry
        );

        // echo json_encode($otp_data);
    }

    $to = $email;

    $output='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
    <head>
        
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
        
        td {
            word-break: break-word;
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
        td,
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
        }
        
        .email-footer p {
            color: rgb(239, 241, 245);
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
                            <img src="https://bluepen.co.in/images/logo.png" alt="Logo" title="" style="width:120px; height:auto"/>
                        </a>
                    </th>
                </tr>
            </table>

            <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td class="content-cell">
                                <div class="f-fallback">
                                    <h1>Hi '.$email.',</h1>
                                    <br>
                                    <p>Given below is the OTP to verify your email id:
                                        <br>OTP: '.$otp.'
                                        <br>Validity: <strong>5 Minutes</strong>
                                        <br>
                                        <br><span style = "color: red">Please don\'t share this OTP with anyone</span>
                                        <br>Happy Academics!!
                                    </p>
                                    <p>Thanks,
                                        <br>Team Bluepen
                                    </p>
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

    $subject = "Welcome to BluePen";
    $body = $output; 
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer;
    $mail->IsSMTP();								//Sets Mailer to send message using SMTP
    $mail->Host = 'mail.bluepen.co.in';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';								//Sets the default SMTP server port
    $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'no-reply@bluepen.co.in';					//Sets SMTP username
    $mail->Password = 'gyaankabhandaar100';					//Sets SMTP password
    $mail->SMTPSecure = 'ssl';
    // $mail->SMTPDebug = 1;							//Sets connection prefix. Options are "", "ssl" or "tls"
    // $mail->From = 'kaushiknathagami14@gmail.com';					//Sets the From email address for the message
    // $mail->FromName = 'BluePen';				//Sets the From name of the message
    $mail->setFrom('no-reply@bluepen.co.in', 'Welcome to Bluepen');
    // $mail->Sender = 'no-reply@bluepen.co.in';
    $mail->AddAddress($to, '');		//Adds a "To" address
    // $mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
    $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);							//Sets message type to HTML				
    $mail->Subject = $subject;				//Sets the Subject of the message
    $mail->Body = $body;				//An HTML or plain text message body
    $mail->DKIM_domain = "bluepen.co.in";
    $mail->DKIM_private = "MIIEpQIBAAKCAQEAyFiJHzoagEmVG+v1QIF6WDWbl8GxeglRcVPtGFkXFbrCwgIi9sSi3YqQG41Dah29tA4d5vk7P/Eh1Drm0IJ/ULoL9MAaXWUgi8uYniw5AP1l4/KmeGT3dNi+b/tNNf5n8G2JlPga4Yrdmaf3aXAkwXwnUqMZLyqS8tO32RgD80hEZo2xVikQcnxYevdad5fNhrFBq05V15l6UVwVsjG/cMEdzPffTvz1G2PcO3XyknureoLHV3e0So4a7ZtAQdyrSWUMbiZQdIfww3M9SpO969qW7LfMjVIYS1hrppoab7+DTbihBc5q3RO3NSSGZ0LSnx2IrgBNcI4Lszlj9WRnIQIDAQABAoIBAGCBjWPWaEedqk7t5ZCyDg4JnK6IZgZkELAnflE5MQ6NjR1JTDBUXiObiHlNHckzFFt0ZWEKc0kEzYfe66pLAisPw4ydMNYGTZwpcZXXtYnNhlQ8YYYjFLRbZ7inc/TrXIQLL7frn38/lilbKKnIlFwDgymiWRJITsrbw3a2w8hfD/QpehsoJGoUa8nHx/IpvRhbK6iay7ZhGzCtYuJcjmNtu830XON21wJme3gAn10RtAPtmXPzh2V6bQSCMWEzFAhggnuTyBffiQE/bwOUC6jEX1Wo6ViDQMpmNOvtL7H8QNwk6NGoGShyUoZCKe0/88P2OPkdlTRX7P3+QXU5BsECgYEA7OskEiLzZEWpAJ4sDZ5l6xQ4aOR+d1r+54RoP55r4/eo7/kLDqeKIzT555Rg76PNWPvXO3l2MPbJBHO8cEEQqgmGb7H0ha03YXiWRhK95A3ULIl89Wlx+fOX9cNug56l1ycniUf+r0Mg4ibh0oZT9fuWlbTaZthfWQmnjPMZYokCgYEA2HtT99Qkq8akgWNewq8YJuNh+HYOgp/CPTe2vJ/bKYpmBpDFcB1/JGCCrHPMcnootLd4X8PJ+FnxQ0ewVNQ3f7N0On/Tyu1mCsPjxGfXagjXa/wgkQQp3pMektHrzAUfEPxPvabKQKMG6TG9rW/DAc/otNA1TC3kz+N//OIcmdkCgYEAmQCyZtQTg2pJXpDHunPVNh/03ijSU5p8jF/CQ3O4EZ1biL65GVmxqFMKITh98cVDVHgv48TpQ23dG/bydzxN2sIUBAZU+A+JeHU79z0bTTBxGeIgxQy4AsgCF0GDGZVXXL94lPvdyqn7jpG1vRPrHSzBbyVA9rI9wW6uuiQ0/KECgYEAgip1rLiEbDz+wUXsvoblsMxcJjdmNii1dHXBjN1ZvDqZai02allyD39wUx01u0e0niULXhmtoYUDSn8aiYco78IJivs9b/EawDJVC82cewdh8G4jbs7gFhLD+Wf7risOKPptQA2/4umjyCe+c0CWMsq+k6n1wh5+THnwhS+4HtECgYEAnykgbhZEpnC7FFO+I25+RsUSk9BWu4agufX/aaaPm6RMg6NIVF78yyaiaTFA78tLas+XPNmoeRI1u2ZV9kwTxvWGiSImEpvxVKfd/xkQuNtDMsNJpiqpRTdmz7kJ+MaUDuOvWGBKiabFQdh9ik4jiF7HOadRDrM38Bf9uawjm6g=";
    $mail->DKIM_selector = 'phpmailer';
    $mail->DKIM_passphrase = '';
    // $mail->Send();
    
    if($mail->Send())								//Send an Email. Return true on success or false on error
    {
        // header("Location: ../signup.php?signup=success");
        // exit();
        // var_dump("mail sent");
        echo json_encode(
            array(
                "status" => "success",
                "otp_data" => $otp_data
            ));
        // echo '<script>console.log("mail sent successfully")</script>';
    }
    else
    {
        // header("Location: ../signup.php?signup=error");
        // exit();
        // var_dump("mail not sent");
        echo json_encode(
            array(
                "status" => "error",
                "otp_data" => $otp_data
            ));
            // echo '<script>console.log("mail not sent")</script>';
    }

?>