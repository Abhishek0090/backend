<?php
    header('Content-Type: application/json, multipart/form-data');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_email = $data['email'];
    $freelancer_email_verified = $data['email_verified'];
    $freelancer_country_name = $data['country_name'];
    $freelancer_country_code = $data['country_code'];
    $freelancer_number = $data['number'];
    $freelancer_number_verified = $data['number_verified'];
    $freelancer_role = $data['role'];
    $freelancer_firstname = $data['firstname'];
    $freelancer_lastname = $data['lastname'];
    $freelancer_gender = $data['gender'];
    $freelancer_whatsapp = $data['whatsapp'];
    $freelancer_address = $data['address'];
    $freelancer_street = $data['street'];
    $freelancer_city = $data['city'];
    $freelancer_state = $data['state'];
    $freelancer_pincode = $data['pincode'];

    $submit = $data['submit'];

    if(empty($freelancer_firstname) || empty($freelancer_lastname) || empty($freelancer_email) || empty ($freelancer_number) || empty($freelancer_whatsapp) || empty($freelancer_gender) || empty($freelancer_address) || empty($freelancer_street) || empty($freelancer_city) || empty($freelancer_state) || empty($freelancer_pincode) || empty($freelancer_country_name) || empty($freelancer_country_code))
    {
        echo json_encode(
            array(
                "message" => "Please fill all the fields",
            ));
        exit();
    }

    $freelancer_number_verified = 0;

    $response = json_encode(array(
        "message" => "entered",
        "submit" => $submit,
        "role" => $freelancer_role,
    ));

    if($submit === "submit")
    {
        $response = json_encode(array("message" => "entered"));
        
        if($freelancer_role == "Non Technical")
        {
            $response =  json_encode(array("message" => "Technical"));

            $is_freelancer_present_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email'";
            $is_freelancer_present_result = mysqli_query($conn, $is_freelancer_present_sql);
            $is_freelancer_present = mysqli_num_rows($is_freelancer_present_result);

            if($is_freelancer_present == 1)
            {
                $data_in_map_sql = "UPDATE `freelancers_map` SET `non technical` = 1, `non_technical_form_filled` = 1 WHERE `email` = '$freelancer_email'";
                $data_in_map = mysqli_query($conn, $data_in_map_sql);
            }
            else
            {
                $data_in_map_sql = "INSERT INTO `freelancers_map`(`email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `technical`, `non technical`, `writer`, `non_technical_form_filled`, `firstname`, `lastname`, `gender`, `whatsapp`, `address`, `street`, `city`, `state`, `pincode`, `agreed`, `technical_form_filled`, `writer_form_filled`) 
                VALUES ('$freelancer_email', '$freelancer_email_verified', '$freelancer_country_name', '$freelancer_country_code', '$freelancer_number', '$freelancer_number_verified', 0, 1, 0, 1, '$freelancer_firstname', '$freelancer_lastname', '$freelancer_gender', '$freelancer_whatsapp', '$freelancer_address', '$freelancer_street', '$freelancer_city', '$freelancer_state', '$freelancer_pincode', 1, 0, 0)";
                $data_in_map = mysqli_query($conn, $data_in_map_sql);
            }

            if($data_in_map == true)
            {
                $get_freelancer_id_sql = "SELECT `id` FROM `freelancers_map` WHERE `email` = '$freelancer_email' ORDER BY `id` DESC LIMIT 1";
                $get_freelancer_id_result = mysqli_query($conn, $get_freelancer_id_sql);
                $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
                $freelancer_id = $get_freelancer_id_row['id'];

                $domains = $data['domains'];
                $domains = str_replace("'", " \' ", $domains);

                $assignment_type = $data['assignment_type'];
                $assignment_type = str_replace("'", " \' ", $assignment_type);
                $assignment_type = json_encode($assignment_type);
                
                $qualification = $data['qualification'];
                $qualification = str_replace("'", " \' ", $qualification);

                $working_hours = $data['working_hours'];
                $working_hours = str_replace("'", " \' ", $working_hours);
                
                $subject_tags = $data['subject_tags'];
                $subject_tags = str_replace("'", " \' ", $subject_tags);
                $subject_tags = json_encode($subject_tags);
                
                $past_experience = $data['past_experience'];
                $past_experience = str_replace("'", " \' ", $past_experience);

                $typing_speed = $data['typing_speed'];
                $typing_speed = str_replace("'", " \' ", $typing_speed);
                
                $work_links = $data['work_links'];
                $work_links = str_replace("'", " \' ", $work_links);
                
                $linkedin = $data['linkedin'];
                $linkedin = str_replace("'", " \' ", $linkedin);
                
                $experience = $data['experience']; // this is freelancing experience
                $experience = str_replace("'", " \' ", $experience);

                $past_work_files_received_random_number = $data['past_work_files_random_number'];
                $past_work_files_string = $data['past_work_files'];

                $resume_files_received_random_number = $data['resume_random_number'];
                $resume_files_string = $data['resume'];

                $profile_photo_files_received_random_number = $data['profile_photo_random_number'];
                $profile_photo_files_string = $data['profile_photo'];

                // if files data is array then append random number to each file name and then move that file from all files folder to specific folder
                // if files data is string the explode to _$_ and then get each file from all files folder and move to specific folder

                $past_work_files = explode('_$_', $past_work_files_string);
                $resume_files = explode('_$_', $resume_files_string);
                $profile_photo_files = explode('_$_', $profile_photo_files_string);

                $file_name_array = array();
            
                $number_of_files = count($past_work_files);    

                if ($number_of_files == 2)
                {
                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[0], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                }
                else if ($number_of_files == 3)
                {
                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[0], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[1], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                }
                else if ($number_of_files == 4)
                {
                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[0], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[1], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[2], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                }
                else if($number_of_files == 5)
                {
                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[0], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[1], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[2], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[3], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                }
                else if ($number_of_files == 6)
                {
                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[0], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[0]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[1], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[1]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[2], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[2]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[3], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[3]);

                    rename("../../files/uploads/freelancers/past_work_files/".$past_work_files[4], "../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4], "freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4], "../team/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4]);
                    copy("../../files/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4], "../freelancer/freelancers/past_work_files/".$freelancer_id."_".$past_work_files[4]);
                }

                $number_of_files = count($resume_files);
                rename("../../files/uploads/freelancers/resume/".$resume_files[0], "../../files/freelancers/resume/".$freelancer_id."_".$resume_files[0]);
                copy("../../files/freelancers/resume/".$freelancer_id."_".$resume_files[0], "freelancers/resume/".$freelancer_id."_".$resume_files[0]);
                copy("../../files/freelancers/resume/".$freelancer_id."_".$resume_files[0], "../team/freelancers/resume/".$freelancer_id."_".$resume_files[0]);
                copy("../../files/freelancers/resume/".$freelancer_id."_".$resume_files[0], "../freelancer/freelancers/resume/".$freelancer_id."_".$resume_files[0]);

                date_default_timezone_set("Asia/Kolkata");
                $now = date("d-m-Y H:i:s");

                $response = json_encode(array(
                    'freelancer_id' => $freelancer_id,
                    'data_in_map_sql' => $data_in_map_sql,
                    'firstname' => $freelancer_firstname,
                    'data_in_map' => $data_in_map,
                    'freelancer_id' => $freelancer_id,
                    'received_data' => $data,
                ));

                $insert_into_non_technical_freelancers_sql = "INSERT INTO 
                `freelancers_nontechnical`(`freelancer_id`, `domains`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `typing_speed`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`, `profile_photo`, `date_of_submission`) 
                VALUES ('$freelancer_id', '$domains', '$assignment_type', '$qualification', '$working_hours', '$subject_tags', '$past_experience', '$typing_speed', '$work_links', '$linkedin', '$experience', '$past_work_files_string', '$resume_files_string', '$profile_photo_files_string', '$now')";
                $insert_into_non_technical_freelancers = mysqli_query($conn, $insert_into_non_technical_freelancers_sql);

                if($insert_into_non_technical_freelancers == true)
                {
                    // $response = json_encode(array(
                    //     'message' => 'Freelancer added successfully', 
                    //     'freelancer_id' => $freelancer_id,
                    //     'status' => 200,
                    //     'query' => $insert_into_non_technical_freelancers_sql
                    // ));
                    mailer1($freelancer_id, $freelancer_email, $freelancer_firstname, $freelancer_lastname);
                    exit();
                }
                else if($insert_into_non_technical_freelancers == false)
                {
                    echo json_encode(array(
                        'message' => 'Freelancer signup failed',
                        'query' => $insert_into_non_technical_freelancers_sql
                    ));
                }
            }
            else if ($data_in_map == false)
            {
                echo json_encode(array(
                    'message' => 'Freelancer not added',
                    
                ));
            }            
        }
        else
        {
            echo json_encode(array(
                'message' => 'Technical',
                'received_data' => $data,
            ));
        }
        
    }
    else
    {
        echo json_encode(array(
            'message' => 'Form not submitted',
            "submit" => $submit,
            'received_data' => $data,
        ));
    }
    
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
                                    <p  style="color:black">Your Freelancer id is #'.$id.'</p>
                                    <h1>Hi, '.$firstname.' '.$lastname.'</h1>
                                    <p>Thank you for registering with us as a Freelancer. We will scrutinize your application and process it further. In case of any doubts or queries, you can contact us at:
                                        <br><a href=mailto:bluepenassign@gmail.com>bluepenassign@gmail.com</a>
                                        <br><a href=tel:+919174117419>91741 17419</a>
                                        <br><a href=tel:+919004185304>90041 85304</a>
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
        $subject = "BluePen";
        $body = $output; 
        // require_once "PHPMailer/PHPMailer.php";
        // require_once "PHPMailer/SMTP.php";
        // require_once "PHPMailer/Exception.php";
        // $mail = new PHPMailer;
        // $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        // $mail->Host = 'mail.bluepen.co.in';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        // $mail->Port = '465';								//Sets the default SMTP server port
        // $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        // $mail->Username = 'squad@bluepen.co.in';					//Sets SMTP username
        // $mail->Password = 'star@parivaar';					//Sets SMTP password
        // $mail->SMTPSecure = 'ssl';
        // $mail->FromName = 'Bluepen';				//Sets the From name of the message
        // $mail->AddAddress($to, '');		//Adds a "To" address
        // $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        // $mail->IsHTML(true);							//Sets message type to HTML				
        // $mail->Subject = $subject;				//Sets the Subject of the message
        // $mail->Body = $body;				//An HTML or plain text message body
        
        // $mail->From = $mail->Username;
        
        // if($mail->Send())								//Send an Email. Return true on success or false on error
        // {
        //     echo json_encode(array(
        //         'message' => 'Registration successful, we will contact you soon', 
        //         'freelancer_id' => $freelancer_id,
        //         'status' => 200
        //     ));
        // }
        // else
        // {
        //     echo json_encode(array(
        //         'message' => 'Registration successful, we will contact you soon', 
        //         'freelancer_id' => $freelancer_id,
        //         'status' => 200
        //     ));
        // }

        $data = array(
            "sender" => array(
                "email" => 'squad@bluepen.co.in',
                "name" => 'Team Bluepen',
            ),
            "to" => array(
                array(
                    "email" => $to,
                    "name" => $firstname.' '.$lastname
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
                'message' => 'Registration successful, we will contact you soon', 
                'freelancer_id' => $id,
                'status' => 200,
                'error' => 'Error:' . curl_error($ch),
                'result' => $result,
            ));
        }
        else
        {
            echo json_encode(array(
                'message' => 'Registration successful, we will contact you soon', 
                'freelancer_id' => $id,
                'status' => 200,
                'result' => $result,
            ));
        }
        // print_r($result);

    }
?>

