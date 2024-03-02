<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    use PHPMailer\PHPMailer\PHPMailer;

    $data = json_decode(file_get_contents("php://input"), true);
    $submit = $data['submit'];

    if ($submit == "submit")
    {
        date_default_timezone_set('Asia/Kolkata');

        // $token = $data['token'];
        // $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))), true);
        // $user_id = $jwt['id'];
        $user_id = $data['user_id'];
        $team_member_id = $data['team_member_id'];

        $domain = $data['domain'];
        $domain = str_replace("'", " \' ", $domain);
        
        $stream = $data['stream'];
        $stream = str_replace("'", " \' ", $stream);
        
        $type = $data['assignment_type'];
        $type = str_replace("'", " \' ", $type);
        $type = json_encode($type);

        $title = $data['title'];
        $title = str_replace("'", " \' ", $title);

        $description = $data['description'];
        $description = str_replace("'", " \' ", $description);
        
        $level = $data['level'];
        $level = str_replace("'", " \' ", $level);
        
        $deadline = $data['deadline'];
        $deadline = str_replace("'", " \' ", $deadline);
        
        $budget = $data['budget'];
        $budget = str_replace("'", " \' ", $budget);

        $assignment_files_received_random_number = $data['assignment_files_random_number'];
        $assignment_files_string = $data['assignment_files'];

        $now = date("d-m-Y H:i:s");

        if($domain == "Freelancer Academic Writing")
        {
            $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$user_id', '$domain')";
            $insert_into_map_result = mysqli_query($conn, $insert_into_map);

            $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$user_id' AND `domain` = '$domain' ORDER BY `id` DESC LIMIT 1";
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
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
            }
            elseif($number_of_files == 3)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
            }
            elseif($number_of_files == 4)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
            }
            elseif($number_of_files == 5)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
            }
            elseif($number_of_files == 6)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
            }
            elseif($number_of_files == 7)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[5], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
            }
            elseif($number_of_files == 8)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[5], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[6], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
            }
            elseif($number_of_files == 9)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[5], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[6], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[7], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
            }
            elseif($number_of_files == 10)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[5], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[6], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[7], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[8], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
            }
            elseif($number_of_files == 11)
            {
                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[0], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[0], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[0]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[1], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[1], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[1]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[2], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[2], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[2]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[3], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[3], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[3]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[4], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[4], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[4]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[5], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[5], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[5]);                

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[6], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[6], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[6]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[7], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[7], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[7]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[8], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[8], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[8]);

                rename("../../files/uploads/assignments/academic_writing/".$assignment_files[9], "../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[9], "assignments/academic_writing/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[9], "../team/assignments/academic_writing/".$assignment_id."_".$assignment_files[9]);
                copy("../../files/assignments/academic_writing/".$assignment_id."_".$assignment_files[9], "../freelancer/assignments/academic_writing/".$assignment_id."_".$assignment_files[9]);
            }

            $insert_assignment_sql = "INSERT INTO 
            `assignment_freelance` (`assignment_id`, `stream`, `title`, `description`, `level`, `type`, `deadline`, `budget`, `files`, `submission_date`, `submitted_by`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `completed`, `review_recieved`, `lost`) 
            VALUES ('$assignment_id', '$stream', '$title', '$description', '$level', '$type', '$deadline', '$budget', '$assignment_files_string', '$now', 'team_member_$team_member_id', 1, 0, 0, 0, 0, 0, 0)";
            $insert_assignment_result = mysqli_query($conn, $insert_assignment_sql);

            if($insert_into_map == true && $insert_assignment_sql == true)
            {
                $dummy_array = array(
                    "message" => "Assignment posted successfully",
                    'id' => $assignment_id,
                    'user_id' => $user_id,
                    'domain' => $domain,
                    'stream' => $stream,
                    'number of files' => $number_of_files,
                    'data' => $data,                    
                );
                mailer1($assignment_id, $email, $user_firstname, $user_lastname, $title, $description, $type, $level, $deadline, $budget);
                exit();
            }
            else
            {
                $dummy_array = array(
                    "message" => "Assignment posting failed",
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
    
    function mailer1($assignment_id, $email, $firstname, $lastname, $title, $description, $type, $level, $deadline, $budget)
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
                                <!--<p style="color:black">Your Assignment id is #'.$assignment_id.'</p>-->
                                    <h1>Hi, '.$firstname.' '.$lastname.'</h1>
                                    <p>We have received your requirement of <strong>Academic Writing</strong>, your assignment id is <strong>#'.$assignment_id.'</strong></p>
                                    <p><strong>title: '.$title.' </strong></p>
                                    <p><strong>Description : '.$description.' </strong></p>
                                    <p><strong>Type of Assignment : '.$type.' </strong></p>
                                    <p><strong>Assignment Level : '.$level.' </strong></p>
                                    <p><strong>Delivery Date : '.$deadline.' </strong></p>
                                    <p><strong>Budget : '.$budget.' </strong></p>

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

        $subject = "Academic Writing Assignment #$assignment_id";
        $body = $output; 

        $data = array(
            "sender" => array(
                "email" => 'assignments@bluepen.co.in',
                "name" => 'Bluepen Assignments',
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
            echo json_encode(array(
                'message' => 'Assignment posted successfully', 
                'status' => 200,
                'error' => 'Error:' . curl_error($ch),
                'result' => $result,
            ));
        }
        else
        {
            echo json_encode(array(
                'message' => 'Assignment posted successfully, please check your mail', 
                'status' => 200,
                'result' => $result,
            ));
        }
        curl_close($ch);
    }

    // echo json_encode($dummy_array);

?>