<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $freelancer_id = $_GET['id'];
    $role = $_GET['role'];

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id' ORDER BY id DESC";
    $get_freelancer_details_query = mysqli_query($conn , $get_freelancer_details_sql);
    $get_freelancer_details = mysqli_fetch_assoc($get_freelancer_details_query);

    $freelancer_email = $get_freelancer_details['email'];
    $freelancer_firstname = $get_freelancer_details['firstname'];
    $freelancer_lastname = $get_freelancer_details['lastname'];

    $password = "bluepen".$freelancer_id;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    

    if($role == "technical")
    {

        $Update_Agree_Approved_Sql = "UPDATE `freelancers_map` SET  `technical_is_approved` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Approved_Query = mysqli_query($conn , $Update_Agree_Approved_Sql);

        if($Update_Agree_Approved_Query)
        {
            $message = "Technical Freelancer Approved Successfully";
            $status = 200;

            $update_freelancer_password_sql = "UPDATE `freelancers_map` SET `password` = '$hashed_password' WHERE `id` = '$freelancer_id'";
            $update_freelancer_password_query = mysqli_query($conn , $update_freelancer_password_sql);

            $swing_status_insert_sql = "INSERT INTO `swing_status` (`freelancer_id`, `status`, `updated_on`) VALUES ('$freelancer_id', '0', '$now')";
            $swing_status_insert_query = mysqli_query($conn , $swing_status_insert_sql);

            mailer1($freelancer_email, $freelancer_id, $freelancer_firstname, $freelancer_lastname, $password);
        }
        else
        {
            $message = "Error";
        }
    }else if($role == "non_technical")
    {
        $Update_Agree_Approved_Sql = "UPDATE `freelancers_map` SET  `non_technical_is_approved` = '1' WHERE `id` = '$freelancer_id' ORDER BY id DESC"  ;
        $Update_Agree_Approved_Query = mysqli_query($conn , $Update_Agree_Approved_Sql);

        if($Update_Agree_Approved_Query)
        {
            $message = "Non Technical Freelancer Approved  Successfully";
            $status = 200;

            $update_freelancer_password_sql = "UPDATE `freelancers_map` SET `password` = '$hashed_password' WHERE `id` = '$freelancer_id'";
            $update_freelancer_password_query = mysqli_query($conn , $update_freelancer_password_sql);

            $swing_status_insert_sql = "INSERT INTO `swing_status` (`freelancer_id`, `status`, `updated_on`) VALUES ('$freelancer_id', '0', '$now')";
            $swing_status_insert_query = mysqli_query($conn , $swing_status_insert_sql);

            mailer1($freelancer_email, $freelancer_id, $freelancer_firstname, $freelancer_lastname, $password);
        }
        else
        {
            $message = "Error";
        }
    }

    function mailer1($email,$id,$first_name,$last_name,$password)
    {
        // var_dump($email);
        // var_dump("entered mailer");
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
                                        <h1>Greetings,<br>'.$first_name.' '.$last_name.'!</h1>
                                        <p>Congratulations on completing the onboarding process. You are now registered on the <strong>Bluepen</strong> portal as freelancer. Your Freelancer ID is '.$id.'. 
                                        <br>
                                        <br>
                                        You can login to your own <strong><a href="https://bluepen.co.in/auth/freelancer/login">Bluepen Portal</a></strong> and start your freelancing journey with us. As we might have informed you, many rewards like <strong>Smart TV, Android Phone, Laptop, Two-Wheeler, etc.</strong> are waiting for you. The details of which can be found on your panel.
                                        <br>
                                        <br>
                                        Your login credentials:
                                        <br>
                                        Email: '.$to.'
                                        <br>
                                        Password: '.$password.'
                                        <br>
                                        <br>
                                        <strong>Note:</strong> 
                                        <br>1. Please change your password immediately after logging in.
                                        <br>2. Please do not share your password with anyone.
                                        <br>3. Incase you are facing any issues, please contact us at <a href="tel:9619305482">+91 96193 05482</a>.
                                        </p>
                                        <br>
                                        <p>PFA a copy of the freelancer joining letter.</p>
                                        <p>Happy Freelancing,
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
            $subject = "Freelance with BluePen";
            // var_dump($subject);
            $body = $output; 
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            // var_dump($subject);
            $mail = new PHPMailer;
            // var_dump('entered mailing function');
            $mail->IsSMTP();								//Sets Mailer to send message using SMTP
            $mail->Host = 'mail.bluepen.co.in';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
            // var_dump($mail->Host);
            $mail->Port = '465';								//Sets the default SMTP server port
            $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->Username = 'squad@bluepen.co.in';					//Sets SMTP username
            $mail->Password = 'star@parivaar';					//Sets SMTP password
            $mail->SMTPSecure = 'ssl';
            // $mail->SMTPDebug = 1;							//Sets connection prefix. Options are "", "ssl" or "tls"
            // $mail->From = 'kaushiknathagami14@gmail.com';					//Sets the From email address for the message
            $mail->FromName = 'Bluepen';				//Sets the From name of the message
            $mail->AddAddress($to, '');		//Adds a "To" address
            // $mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
            $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
            $mail->IsHTML(true);							//Sets message type to HTML				
            $mail->Subject = $subject;				//Sets the Subject of the message
            $mail->Body = $body;				//An HTML or plain text message body
            
            $mail->addBcc("squad@bluepen.co.in");
            $mail->DKIM_domain = "bluepen.co.in";
            $mail->DKIM_private = "MIIEpQIBAAKCAQEAyFiJHzoagEmVG+v1QIF6WDWbl8GxeglRcVPtGFkXFbrCwgIi9sSi3YqQG41Dah29tA4d5vk7P/Eh1Drm0IJ/ULoL9MAaXWUgi8uYniw5AP1l4/KmeGT3dNi+b/tNNf5n8G2JlPga4Yrdmaf3aXAkwXwnUqMZLyqS8tO32RgD80hEZo2xVikQcnxYevdad5fNhrFBq05V15l6UVwVsjG/cMEdzPffTvz1G2PcO3XyknureoLHV3e0So4a7ZtAQdyrSWUMbiZQdIfww3M9SpO969qW7LfMjVIYS1hrppoab7+DTbihBc5q3RO3NSSGZ0LSnx2IrgBNcI4Lszlj9WRnIQIDAQABAoIBAGCBjWPWaEedqk7t5ZCyDg4JnK6IZgZkELAnflE5MQ6NjR1JTDBUXiObiHlNHckzFFt0ZWEKc0kEzYfe66pLAisPw4ydMNYGTZwpcZXXtYnNhlQ8YYYjFLRbZ7inc/TrXIQLL7frn38/lilbKKnIlFwDgymiWRJITsrbw3a2w8hfD/QpehsoJGoUa8nHx/IpvRhbK6iay7ZhGzCtYuJcjmNtu830XON21wJme3gAn10RtAPtmXPzh2V6bQSCMWEzFAhggnuTyBffiQE/bwOUC6jEX1Wo6ViDQMpmNOvtL7H8QNwk6NGoGShyUoZCKe0/88P2OPkdlTRX7P3+QXU5BsECgYEA7OskEiLzZEWpAJ4sDZ5l6xQ4aOR+d1r+54RoP55r4/eo7/kLDqeKIzT555Rg76PNWPvXO3l2MPbJBHO8cEEQqgmGb7H0ha03YXiWRhK95A3ULIl89Wlx+fOX9cNug56l1ycniUf+r0Mg4ibh0oZT9fuWlbTaZthfWQmnjPMZYokCgYEA2HtT99Qkq8akgWNewq8YJuNh+HYOgp/CPTe2vJ/bKYpmBpDFcB1/JGCCrHPMcnootLd4X8PJ+FnxQ0ewVNQ3f7N0On/Tyu1mCsPjxGfXagjXa/wgkQQp3pMektHrzAUfEPxPvabKQKMG6TG9rW/DAc/otNA1TC3kz+N//OIcmdkCgYEAmQCyZtQTg2pJXpDHunPVNh/03ijSU5p8jF/CQ3O4EZ1biL65GVmxqFMKITh98cVDVHgv48TpQ23dG/bydzxN2sIUBAZU+A+JeHU79z0bTTBxGeIgxQy4AsgCF0GDGZVXXL94lPvdyqn7jpG1vRPrHSzBbyVA9rI9wW6uuiQ0/KECgYEAgip1rLiEbDz+wUXsvoblsMxcJjdmNii1dHXBjN1ZvDqZai02allyD39wUx01u0e0niULXhmtoYUDSn8aiYco78IJivs9b/EawDJVC82cewdh8G4jbs7gFhLD+Wf7risOKPptQA2/4umjyCe+c0CWMsq+k6n1wh5+THnwhS+4HtECgYEAnykgbhZEpnC7FFO+I25+RsUSk9BWu4agufX/aaaPm6RMg6NIVF78yyaiaTFA78tLas+XPNmoeRI1u2ZV9kwTxvWGiSImEpvxVKfd/xkQuNtDMsNJpiqpRTdmz7kJ+MaUDuOvWGBKiabFQdh9ik4jiF7HOadRDrM38Bf9uawjm6g=";
            $mail->DKIM_selector = 'phpmailer';
            $mail->DKIM_passphrase = '';
            $mail->DKIM_identity = $mail->From = $mail->Username;
                
            // $profileimage =count($assignment);
            // var_dump($mail->SMTPSecure);
            // for( $i=0 ; $i < $profileimage ; $i++ )
            // {
            //     $profiletarget1 = "../submission/".$_FILES['assignment']['name'][$i];
            //     $mail->addAttachment($profiletarget1);
            // }
            $welcome_letter = "freelancers/Freelancer Joining Letter by Bluepen.pdf";
            $mail->addAttachment($welcome_letter);
            $mail->From = $mail->Username;
            
            if($mail->Send())								//Send an Email. Return true on success or false on error
            {
                // echo 'Mail Sent Successfully';
                // echo '<script> setTimeout(function() { window.location = "../freelancerdetails.php?id='.$id.'"; }, 3000); </script>';
                // exit();
                // return;
                $message = "Mail Sent Successfully";
            }
            else{
                // header("Location: ../submit.php?signup=error");
                // var_dump("mail failed id 0");
                // exit();
                // return;
                $message = "Mail not Sent";
            }
            // var_dump("mail failed id 1");
            $message = "Mailer Failed";
        }

        echo json_encode(array(
            'message' => $message,
            'status' => $status
        ));
?>