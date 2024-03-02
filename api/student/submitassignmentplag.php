<?php

    // user's name, email id, number and files as input
    // register into new table
    // move files
    // send mail to above email id

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    // use PHPMailer\PHPMailer\PHPMailer;

    $data = json_decode(file_get_contents("php://input"), true);
    $submit = $data['submit'];
    
    if ($submit == "submit")
    {
        date_default_timezone_set('Asia/Kolkata');

        // $token = $data['token'];
        // $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
        // $user_id = $jwt['id'];
        $user_id = $data['user_id'];
        
        $domain = $data['domain'];
        $domain = str_replace("'", " \' ", $domain);

        $name = $data['name'];
        $name = str_replace("'", " \' ", $name);

        $email = $data['email'];
        $email = str_replace("'", " \' ", $email);

        $country_name = $data['country_name'];
        $country_name = str_replace("'", " \' ", $country_name);
        
        $country_code = $data['country_code'];
        $country_code = str_replace("'", " \' ", $country_code);
        
        $number = $data['number'];
        $accepted = $data['accepted'];
        $utm_data = $data['utm_data'];
        $utm_data = json_encode($utm_data);
        
        $assignment_files_received_random_number = $data['assignment_files_random_number'];
        $assignment_files_string = $data['assignment_files'];

        $now = date("d-m-Y H:i:s");

        if($domain == "Plagiarism Check")
        {
            $insert_into_table_sql = "INSERT INTO `assignment_plag_check` (`name`, `country_name`, `country_code`, `number`, `email`, `files`, `submission_date`)
            VALUES ('$name', '$country_name', '$country_code', '$number', '$email', '$assignment_files_string', '$now')";
            $insert_into_table_result = mysqli_query($conn, $insert_into_table_sql);

            $get_id_sql = "SELECT * FROM `assignment_plag_check` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 1";
            $get_id_result = mysqli_query($conn, $get_id_sql);
            $get_id_row = mysqli_fetch_assoc($get_id_result);
            $assignment_id = $get_id_row['id'];

            $assignment_files = explode('_$_', $assignment_files_string);
            $number_of_files = count($assignment_files);

            if($number_of_files == 2)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
            }
            elseif($number_of_files == 3)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
            }
            elseif($number_of_files == 4)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
            }
            elseif($number_of_files == 5)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
            }
            elseif($number_of_files == 6)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
            }
            elseif($number_of_files == 7)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[5], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
            }
            elseif($number_of_files == 8)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[5], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[6], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
            }
            elseif($number_of_files == 9)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[5], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[6], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[7], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
            }
            elseif($number_of_files == 10)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[5], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[6], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[7], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[8], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
            }
            elseif($number_of_files == 11)
            {
                rename("../../files/uploads/assignments/plag_check/".$assignment_files[0], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[1], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[2], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[3], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[4], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[5], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[6], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[7], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[8], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[8], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[8]);

                rename("../../files/uploads/assignments/plag_check/".$assignment_files[9], "../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[9], "assignments/plag_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[9], "../team/assignments/plag_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plag_check/".$assignment_id."_".$assignment_files[9], "../freelancer/assignments/plag_check/".$assignment_id."_".$assignment_files[9]);
            }

            if($insert_into_table_result == true)
            {
                // $get_id_sql = "SELECT * FROM `assignment_plag_check` WHERE `email` = $email ORDER BY `id` DESC LIMIT 1";
                // $get_id_result = mysqli_query($conn, $get_id_sql);
                // $get_id_row = mysqli_fetch_assoc($get_id_result);
                // $assignment_id = $get_id_row['id'];
                
                $dummy_array = array(
                    "message" => "Assignment posted successfully",
                    'id' => $assignment_id,
                    'data' => $data,                    
                );
                // mailer1($assignment_id, $user_id, $email, $user_firstname, $user_lastname, $title, $description, $type, $level, $deadline, $budget);
            }
            else if($insert_into_table_result == false)
            {
                $dummy_array = array(
                    "message" => "Assignment posting failed",
                );
            }
        }

        else
        {
            $dummy_array = array(
                "message" => "Not a freelancing assignment",
            );
        }
    }

    else
    {
        $dummy_array = array(
            'message' => "Invalid Request"
        );
    }

    echo json_encode($dummy_array);

?>