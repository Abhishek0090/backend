<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // $freelancer_id = $_GET['freelancer_id'];
    // $assignment_id = $_GET['assignment_id'];
    // $team_id = $_GET['team_id'];
    // $title = $_GET['title'];

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];
    $assignment_id = $data['assignment_id'];
    $team_id = $data['team_id'];
    $title = $data['title'];
    $body = $data['body'];

    $title = str_replace("'", "\'", $title);
    $body = str_replace("'", "\'", $body);

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y", strtotime("now"));

    $assign_to_freelancer_sql = "INSERT INTO `assign_to_freelancer`(`freelancer_id`, `assignment_id`, `status`) VALUES ('$freelancer_id', '$assignment_id', '1')";
    $assign_to_freelancer_query = mysqli_query($conn, $assign_to_freelancer_sql);

    $insert_mail_sql = "INSERT INTO `assignment_mail_to_freelancer` (`assignment_id`, `freelancer_id`, `team_id`, `date_of_sending`, `title`, `body`) VALUES ('$assignment_id', '$freelancer_id', '$team_id', '$now', '$title', '$body')";
    $insert_mail_query = mysqli_query($conn, $insert_mail_sql);

    $freelancer_details = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $freelancer_details_query = mysqli_query($conn, $freelancer_details);
    $freelancer_details_data = mysqli_fetch_assoc($freelancer_details_query);
    
    $freelancer_first_name = $freelancer_details_data['firstname'];
    $freelancer_last_name = $freelancer_details_data['lastname'];
    $freelancer_name = $freelancer_first_name." ".$freelancer_last_name;
    $freelancer_mail = $freelancer_details_data['email'];

    // check if assignment is by affiliate user
    // if yes then get assignment type (dissertation or not)
    // run query to enter data in affiliate 

    $assignment_id_sql = "SELECT * FROM `assignment_map` WHERE `id` = '$assignment_id'";
    $assignment_id_query = mysqli_query($conn, $assignment_id_sql);
    $assignment_id_data = mysqli_fetch_assoc($assignment_id_query);
    $user_id = $assignment_id_data['user_id'];

    $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
    $get_user_details_result = mysqli_query($conn, $get_user_details_sql) or die(mysqli_error($conn));
    $get_user_details_row = mysqli_fetch_assoc($get_user_details_result);
    $user_affiliate_code_by = $get_user_details_row['affiliate_code_by'];
    
    if($user_affiliate_code_by != null)
    {
        // check if assignment poster user id and affiliate code by user id are already present in payments table
        // if no then check assignment type, calculate amount and run query
        // if dissertation then 1500 else 500

        $get_affiliate_payments_data = "SELECT * FROM `affiliate_payments` WHERE `user_id` = '$user_id' AND `affiliate_code_by` = '$user_affiliate_code_by'";
        $get_affiliate_payments_query = mysqli_query($conn, $get_affiliate_payments_data);
        $get_affiliate_payments_row_number = mysqli_num_rows($get_affiliate_payments_query);
        
        if($get_affiliate_payments_row_number == 0)
        {
            $assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
            $assignment_data_query = mysqli_query($conn, $assignment_data_sql);
            $assignment_data = mysqli_fetch_assoc($assignment_data_query);
            $assignment_type = $assignment_data['assignment_type'];
            $assignment_type = json_decode($assignment_type);

            date_default_timezone_set('Asia/Kolkata');
            $now = date("d-m-Y H:i:s");

            if(in_array("Dissertation Writing", $assignment_type))
            {
                // amount is 1500
                $amount = 1500;
                $insert_into_affiliate_payments_sql = "INSERT INTO `affiliate_payments` (`assignment_id`, `user_id`, `added_on`, `amount`, `affiliate_by_user_id`, `status`) VALUES ('$assignment_id', '$user_id', '$user_affiliate_code_by', '$amount', '$now')";
            }
            else
            {
                // amount is 500
                $amount = 500;
                $insert_into_affiliate_payments_sql = "INSERT INTO `affiliate_payments` (`assignment_id`, `user_id`, `added_on`, `amount`, `affiliate_by_user_id`, `status`) VALUES ('$assignment_id', '$user_id', '$user_affiliate_code_by', '$amount', '$now')";
            }
        }
    }

    if($assign_to_freelancer_query)
    {
        $message = "Assignment Assigned";
        $status = 200;
        echo json_encode(array(
            'message' => $message ,
            'status' => 200,
            'insert_into_affiliate_payments_sql' => $insert_into_affiliate_payments_sql,
        ));
        // mailer1($freelancer_mail, $freelancer_name, $assignment_id, $status);
        // exit();
    }
    else
    {
        $message = "Assignment not assigned";
        echo json_encode(array(
            'message' => $message ,
            'status' => $status
        ));
        exit();
    }

    function mailer1($email,$freelancer_name,$assignment_id, $status)
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
                                    <h1>Hi, '.$freelancer_name.'</h1>
                                    <p><strong>Assignment ID '.$assignment_id.'</strong> has been assigned to you on the agreed upon commercial.
                                    <br>
                                    <br>We hope that you complete this assignment keeping all the guidelines in mind as quickly as possible without compromising the quality.</p>
    
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
        
        $subject = "Assignment Assigned to you";
        
        $body = $output; 

        $data = array(
            "sender" => array(
                "email" => 'squad@bluepen.co.in',
                "name" => 'Team Bluepen',
            ),
            "to" => array(
                array(
                    "email" => $to,
                    "name" => $freelancer_name
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
            echo json_encode(array(
                'message' => 'Assignment assigned but mail not sent', 
                'status' => 200,
                'error' => 'Error:' . curl_error($ch),
                'result' => $result,
            ));
        }
        else
        {
            echo json_encode(array(
                'message' => 'Assignment assigned and mail sent', 
                'status' => 200,
                'result' => $result,
            ));
        }
        curl_close($ch);
    }

?>