<?php

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
        $now = date("d-m-Y H:i:s");

        // $token = $data['token'];
        // $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
        // $user_id = $jwt['id'];
        $user_id = $data['user_id'];
        
        $domain = $data['domain'];
        $domain = str_replace("'", " \' ", $domain);
        
        $assignment_files_received_random_number = $data['assignment_files_random_number'];
        $assignment_files_string = $data['assignment_files'];

        if($domain == "Plagiarism Check")
        {
            // $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$user_id', '$domain')";
            // $insert_into_map_result = mysqli_query($conn, $insert_into_map);

            $insert_assignment_sql = "INSERT INTO `assignment_plagiarism_check` (`user_id`, `files`, `submission_date`) VALUES ('$user_id', '$assignment_files_string', '$now')";
            $insert_assignment_result = mysqli_query($conn, $insert_assignment_sql);

            $get_assignment_id = "SELECT `id` FROM `assignment_plagiarism_check` WHERE `user_id` = '$user_id' ORDER BY `id` DESC LIMIT 1";
            $get_assignment_id_result = mysqli_query($conn, $get_assignment_id);
            $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            $assignment_id = $get_assignment_id_row['id'];

            $user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
            $user_details_result = mysqli_query($conn, $user_details_sql);
            $user_details_row = mysqli_fetch_assoc($user_details_result);
            $user_firstname = $user_details_row['firstname'];
            $user_lastname = $user_details_row['lastname'];
            $email = $user_details_row['email'];

            $assignment_files = explode('_$_', $assignment_files_string);
            $number_of_files = count($assignment_files);
            if($number_of_files == 2)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
            }
            elseif($number_of_files == 3)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
            }
            elseif($number_of_files == 4)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
            }
            elseif($number_of_files == 5)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
            }
            elseif($number_of_files == 6)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
            }
            elseif($number_of_files == 7)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[5], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
            }
            elseif($number_of_files == 8)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[5], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[6], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
            }
            elseif($number_of_files == 9)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[5], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[6], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[7], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
            }
            elseif($number_of_files == 10)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[5], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[6], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[7], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[8], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
            }
            elseif($number_of_files == 11)
            {
                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[0], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[1], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[2], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[3], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[4], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[5], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[6], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[7], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[8], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[8]);

                rename("../../files/uploads/assignments/plagiarism_check/".$assignment_files[9], "../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9], "assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9], "../team/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9], "../student/assignments/plagiarism_check/".$assignment_id."_".$assignment_files[9]);
            }

            // $insert_assignment_sql = "INSERT INTO 
            // `assignment_plagiarism_check` (`assignment_id`, `files`, `submission_date`) 
            // VALUES ('$assignment_id', '$assignment_files_string', '$now')";
            // $insert_assignment_result = mysqli_query($conn, $insert_assignment_sql);

            $number_of_files -= 1;
            $price = 200;
            $amount = $price * $number_of_files;

            if($insert_assignment_result == true)
            {
                $dummy_array = array(
                    "message" => "Assignment posted successfully",
                    'id' => $assignment_id,
                    'user_id' => $user_id,
                    'number_of_files' => $number_of_files,
                    'price' => $price,
                    'amount' => $amount,
                    'data' => $data,
                    "type_of_user_id" => gettype($user_id),
                    // "map_sql" => $insert_into_map,
                    "insert_assignment_sql" => $insert_assignment_sql,    
                );
            }
            else
            {
                $dummy_array = array(
                    "message" => "Assignment posting failed",
                    'id' => $assignment_id,
                    'user_id' => $user_id,
                    'number_of_files' => $number_of_files,
                    'price' => $price,
                    'amount' => $amount,
                    'data' => $data,
                    "type_of_user_id" => gettype($user_id),
                    // "map_sql" => $insert_into_map,
                    "insert_assignment_sql" => $insert_assignment_sql, 
                );
            }
        }

        else if( $domain == "Assignment")
        {
            $box = "left";
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