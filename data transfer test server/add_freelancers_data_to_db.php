<?php

    include_once 'new_connect.php';

    $filename = 'freelancers_data.json';
    if(file_exists($filename))
    {
        $data = file_get_contents($filename);

        $data = json_decode($data, true);
        
        $number_of_arrays = count($data);
        
        for($i = 0; $i < $number_of_arrays; $i++)
        {
            var_dump($i);

            $old_freelancer_id = $data[$i]['id'];
            $old_firstname = $data[$i]['firstname'];
            $old_lastname = $data[$i]['lastname'];
            $old_email = $data[$i]['email'];
            $old_gender = $data[$i]['gender'];
            $old_country = $data[$i]['country'];
            $old_mobile = $data[$i]['mobile'];
            $old_whatsapp = $data[$i]['whatsapp'];
            $old_address = $data[$i]['address'];
            $old_street = $data[$i]['street'];
            $old_city = $data[$i]['city'];
            $old_state = $data[$i]['state'];
            $old_postalcode = $data[$i]['postalcode'];
            $old_pan_card = $data[$i]['pan_number'];
            $old_date_of_submission = $data[$i]['date_of_submission'];
            $old_domain = $data[$i]['domain'];
            $old_subject_tags = $data[$i]['subject_tags'];
            $old_assignment_type = $data[$i]['assignment_type'];
            $old_qualification = $data[$i]['qualification'];
            $old_working_hours = $data[$i]['working_hours'];
            $old_past_experience = $data[$i]['past_experience'];
            $old_past_work = $data[$i]['past_work'];
            $old_work_links = $data[$i]['work_links'];
            $old_linkedin = $data[$i]['linkedin'];
            $old_freelance_experience = $data[$i]['freelance_experience'];
            $old_resume = $data[$i]['resume'];
            $old_approved = $data[$i]['approved'];
            $old_number_of_assignments = $data[$i]['number_of_assignments'];
            $old_level = $data[$i]['level'];
            $old_form_filled = $data[$i]['form-filled'];
            $old_interview_conducted = $data[$i]['interview_conducted'];
            $old_send_agreement = $data[$i]['send_agreement'];
            $old_agreement_received = $data[$i]['agreement_received'];
            $old_password = $data[$i]['password'];

            echo "Assignment Details";
            echo "<br>";
            // echo $old_freelancer_id;
            // echo "<br>";
            // echo $old_firstname;
            // echo "<br>";
            // echo $old_lastname;
            // echo "<br>";
            // echo $old_email;
            // echo "<br>";
            // echo $old_gender;
            // echo "<br>";
            // echo $old_country;
            // echo "<br>";
            // echo $old_mobile;
            // echo "<br>";
            // echo $old_whatsapp;
            // echo "<br>";
            // echo $old_address;
            // echo "<br>";
            // echo $old_street;
            // echo "<br>";
            // echo $old_city;
            // echo "<br>";
            // echo $old_state;
            // echo "<br>";
            // echo $old_postalcode;
            // echo "<br>";
            // echo $old_pan_card;
            // echo "<br>";
            // echo $old_date_of_submission;
            // echo "<br>";
            // echo $old_domain;
            // echo "<br>";
            // echo $old_subject_tags;
            // echo "<br>";
            // echo $assignment_type;
            // echo "<br>";
            // echo $old_qualification;
            // echo "<br>";
            // echo $old_working_hours;
            // echo "<br>";
            // echo $old_past_experience;
            // echo "<br>";
            // echo $old_past_work;
            // echo "<br>";
            // echo $old_work_links;
            // echo "<br>";
            // echo $old_linkedin;
            // echo "<br>";
            // echo $old_freelance_experience;
            // echo "<br>";
            // echo $old_resume;
            // echo "<br>";
            // echo $old_approved;
            // echo "<br>";
            // echo $old_number_of_assignments;
            // echo "<br>";
            // echo $old_level;
            // echo "<br>";
            // echo $old_form_filled;
            // echo "<br>";
            // echo $old_interview_conducted;
            // echo "<br>";
            // echo $old_send_agreement;
            // echo "<br>";
            // echo $old_agreement_received;
            // echo "<br>";
            // echo $old_password;
            // echo "<br>";
            // echo "<br>";
            // echo "--------------------------------------------------------------------------------------------------";
            // echo "<br>";
            // echo "<br>";

            $stream = "";

            switch($old_domain)
            {
                case 0:
                    $stream = "Technical";
                    break;
                case 1:
                    $stream = "Non Technical";
                    break;
            }
            // echo($stream);
            // echo "<br>";

            if($stream == "Technical")
            {
                $insert_into_map = "INSERT INTO `freelancers_map` (`id`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `technical`, `non technical`, `writer`, `technical_form_filled`, `technical_interview_conducted`, `technical_agreement_sent`, `technical_agreement_received`, `technical_is_approved`, `non_technical_form_filled`, `non_technical_interview_conducted`, `non_technical_agreement_sent`, `non_technical_agreement_received`, `non_technical_is_approved`, `writer_form_filled`, `writer_interview_conducted`, `writer_agreement_sent`, `writer_agreement_received`, `writer_is_approved`, `is_active`, `firstname`, `lastname`, `address`, `street`, `city`, `state`, `pincode`, `agreed`, `password`)
                VALUES ('$old_freelancer_id', '$old_email', 1, '$old_country', 91, '$old_mobile', 0, 1, 0, 0, '$old_form_filled', '$old_interview_conducted', '$old_send_agreement', '$old_agreement_received', '$old_approved', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '$old_firstname', '$old_lastname', '$old_address', '$old_street', '$old_city', '$old_state', '$old_postalcode', 1, '$old_password')";
                $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);

                $get_freelancer_id = "SELECT `id` FROM `freelancers_map` WHERE `id` = '$old_freelancer_id' ORDER BY `id` DESC LIMIT 1";
                $get_freelancer_id_result = mysqli_query($new_conn, $get_freelancer_id);
                $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
                $freelancer_id = $get_freelancer_id_row['id'];

                $insert_into_technical = "INSERT INTO `freelancers_technical` (`freelancer_id`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`)
                VALUES ('$freelancer_id', '$old_assignment_type', '$old_qualification', '$old_working_hours', '$old_subject_tags', '$old_past_experience', '$old_work_links', '$old_linkedin', '$old_past_experience', '$old_past_work', '$old_resume')";
                $insert_into_map_result = mysqli_query($new_conn, $insert_into_technical);
            }
            if($stream == "Non Technical")
            {
                $insert_into_map = "INSERT INTO `freelancers_map` (`id`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `technical`, `non technical`, `writer`, `technical_form_filled`, `technical_interview_conducted`, `technical_agreement_sent`, `technical_agreement_received`, `technical_is_approved`, `non_technical_form_filled`, `non_technical_interview_conducted`, `non_technical_agreement_sent`, `non_technical_agreement_received`, `non_technical_is_approved`, `writer_form_filled`, `writer_interview_conducted`, `writer_agreement_sent`, `writer_agreement_received`, `writer_is_approved`, `is_active`, `firstname`, `lastname`, `address`, `street`, `city`, `state`, `pincode`, `agreed`, `password`)
                VALUES ('$old_freelancer_id', '$old_email', 1, '$old_country', 91, '$old_mobile', 0, 0, 1, 0, 0, 0, 0, 0, 0, '$old_form_filled', '$old_interview_conducted', '$old_send_agreement', '$old_agreement_received', '$old_approved', 0, 0, 0, 0, 0, 1, '$old_firstname', '$old_lastname', '$old_address', '$old_street', '$old_city', '$old_state', '$old_postalcode', 1, '$old_password')";
                $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);

                $get_freelancer_id = "SELECT `id` FROM `freelancers_map` WHERE `id` = '$old_freelancer_id' ORDER BY `id` DESC LIMIT 1";
                $get_freelancer_id_result = mysqli_query($new_conn, $get_freelancer_id);
                $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
                $freelancer_id = $get_freelancer_id_row['id'];

                $insert_into_non_technical = "INSERT INTO `freelancers_nontechnical` (`freelancer_id`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`)
                VALUES ('$freelancer_id', '$old_assignment_type', '$old_qualification', '$old_working_hours', '$old_subject_tags', '$old_past_experience', '$old_work_links', '$old_linkedin', '$old_past_experience', '$old_past_work', '$old_resume')";
                $insert_into_map_result = mysqli_query($new_conn, $insert_into_non_technical);
                
            }

            // $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$old_assignment_user_id', 'Freelancer')";
            // // var_dump($insert_into_map);
            // $insert_into_map_result = mysqli_query($new_conn, $insert_into_map);

            // $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$old_assignment_user_id' AND `domain` = 'Freelancer' ORDER BY `id` DESC LIMIT 1";
            // $get_assignment_id_result = mysqli_query($new_conn, $get_assignment_id);
            // $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
            // $assignment_id = $get_assignment_id_row['id'];

            // $title = $old_assignment_title;
            // $description = $old_assignment_description;
            // $course = $old_assignment_course;
            // $level = $old_assignment_assignment_level;
            // $type = $old_assignment_assignment_type;
            // $subject_tags = $old_assignment_subject_tags;
            // $deadline = $old_assignment_deadline. " " . $old_assignment_time;
            // $budget = $old_assignment_budget;
            // $file = $old_assignment_filename;
            // date_default_timezone_set('Asia/Kolkata');
            // $now = date("Y-m-d H:i:s");
            // $posted = $old_assignment_posted;
            // $under_process = $old_assignment_under_process;
            // $assigned_to_pm = $old_assignment_assigned_to_pm;
            // $assigned_to_freelancer = $old_assignment_assigned_to_freelancer;
            // $completed = $old_assignment_confirmed;
            // $review_received = $old_assignment_review_recieved;
            // $lost = $old_assignment_lost;

            
            // $insert_assignment_sql = "INSERT INTO `assignment_freelance` (`assignment_id`, `stream`, `title`, `description`, `course`, `level`, `type`, `subject_tags`, `deadline`, `budget`, `files`, `submission_date`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `completed`, `review_recieved`, `lost`) 
            // VALUES ('$assignment_id', '$stream', '$title', '$description', '$course', '$level', '$type', '$subject_tags', '$deadline', '$budget', '$file', '$now', '$posted', '$under_process', '$assigned_to_pm', '$assigned_to_freelancer', '$completed', '$review_received', '$lost')";
            // // echo $insert_assignment_sql;
            // // echo "<br>";
            // $insert_assignment_result = mysqli_query($new_conn, $insert_assignment_sql);
            // echo $insert_assignment_result;
            // echo "<br>";
        }
    }

    else
    {
        var_dump("File does not exist");
    }

?>