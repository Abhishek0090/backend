<?php

    include 'api/connect.php';

    $data_array = array();
    $get_data_sql = "SELECT * FROM `freelancers_map` ORDER BY `id` DESC LIMIT 100 OFFSET 577";
    $get_data_result = mysqli_query($conn, $get_data_sql) or die(mysqli_error($conn));
    while($get_data_row = mysqli_fetch_assoc($get_data_result))
    {
        $id = $get_data_row['id'];
        $email = $get_data_row['email'];
        $firstname = $get_data_row['firstname'];
        $lastname = $get_data_row['lastname'];
        $name = $firstname." ".$lastname;
        
        $data = array(
            'id' => $id,
            'email' => $email,
            'name' => $name,
        );

        array_push($data_array, $data);

        // mailer1($id, $email, $firstname, $lastname);
    }
    echo json_encode($data_array);

    // $id = 2;
    // $email = "bhavyaharia100@gmail.com";
    // $firstname = "Bhavya";
    // $lastname = "Haria";

    // mailer1($id, $email, $firstname, $lastname);

    function mailer1($id, $email, $firstname, $lastname)
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
                
                /*p {
                    color: #51545E;
                }*/
                
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
                        <img src="https://bluepen.co.in/images/bluepen.png" title="" style="width:120px; height:auto"/>
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
                                        
                                        <h1>Dear, '.$firstname.'</h1>
                                        <p>We trust this mail finds you well and thriving in your freelancing endeavors.
                                        <br>
                                        As valued members of our freelance community, we are thrilled to share some exciting news with you!
                                        <br><br>
                                        We are super delighted to announce the launch of our new platform, Introducing <a href="https://projectbhai.com/">Project Bhai</a> - Your Gateway to Selling Ready-Made Projects. 
                                        <br>
                                        <a href="https://projectbhai.com/">Project Bhai</a>, is designed to empower you by providing an avenue to showcase and sell your existing projects. 
                                        <br>
                                        Whether you have well-crafted assignments, research papers, codes or any other educational materials, Project Bhai is the perfect marketplace to connect with students seeking quality content.
                                        <br><br>
                                        Here\'s why <a href="https://projectbhai.com/">Project Bhai</a>, is a game-changer for you:
                                        <br><br>
                                        ○ Monetize Your Expertise:  Transform your hard work into revenue by listing your completed projects for sale. Your knowledge and skills deserve recognition and compensation.
                                        <br>
                                        ○ Expand Your Reach: Reach a broader audience of students actively searching for ready-made projects. Our platform acts as a bridge, connecting your work with those who can benefit from it.
                                        <br>
                                        ○ User-Friendly Listing: Our platform offers a straightforward and user-friendly listing process. Showcase your projects with ease, including relevant details, pricing, and any additional information to attract potential buyers.
                                        <br>
                                        ○ ZERO listing fee : Rest assured that listings on <a href="https://projectbhai.com/">Project Bhai</a>, are absolutely free. We prioritize the safety and privacy of both sellers and buyers, ensuring a smooth experience for everyone.
                                        <br>
                                        ○ Promotional Opportunities: Benefit from our marketing efforts as we actively promote the platform to students and educational institutions, increasing visibility for your projects.
                                        <br><br>
                                        To get started, simply log in to your <a href="https://projectbhai.com/">Project Bhai</a>, account and explore the new "Sell Your Projects" feature. Your contributions are invaluable, and we\'re excited to see you thrive on our platform.
                                        <br><br>
                                        Thank you for being an essential part of our freelance community. We believe <a href="https://projectbhai.com/">Project Bhai</a>, will open up new opportunities for you, and we can\'t wait to see your projects flourish on our platform.
                                        <br><br>
                                        Should you have any questions or need assistance, feel free to reach out to our support team at <a href="https://projectbhai.com/">Project Bhai</a>, 
                                        <br><br>
                                        Happy freelancing!
                                        <br><br>
                                        Best regards,
                                        <br><br>
                                        Team - Project Bhai
                                        <br>
                                        By Bluepen
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
        
        $subject = "This is new! This is Big! This is it!";
        
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
            // echo 'Error:' . curl_error($ch);
            // echo json_encode(array(
            //     'message' => 'Assignment assigned but mail not sent', 
            //     'status' => 200,
            //     'error' => 'Error:' . curl_error($ch),
            //     'result' => $result,
            // ));
            echo json_encode(array(
                'status' => 'failure',
                'message' => 'Mail not sent to #'.$id.' - '.$firstname. ' '.$lastname,
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
                'message' => 'Jai Diwali to #'.$id.' - '.$firstname. ' '.$lastname,
                // 'error' => 'Error:' . curl_error($ch),
                // 'result' => $result,
            ));
        }
        // array_push($data_array, $data);
        curl_close($ch);
    }

?>