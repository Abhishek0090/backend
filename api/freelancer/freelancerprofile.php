<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];

    $data_array = array();
    $sub_array_data = array();

    $freelancer_profile_sql = " SELECT `id`,`email`,`email_verified`,`country_name`,`country_code`,`number`,`number_verified`,`technical`,`non technical`,`writer`,`technical_form_filled`,`technical_interview_conducted`,`technical_agreement_sent`,`technical_agreement_received`,`technical_is_approved`,`non_technical_form_filled`,`non_technical_interview_conducted`,`non_technical_agreement_sent`,`non_technical_agreement_received`,`non_technical_is_approved`,`writer_form_filled`,`writer_interview_conducted`,`writer_agreement_sent`,`writer_agreement_received`,`writer_is_approved`,`is_active`,`firstname`,`lastname`,`gender`,`whatsapp`,`address`,`street`,`city`,`state`,`pincode`  FROM `freelancers_map` WHERE `id` = '$freelancer_id'  ORDER BY `id` DESC";
    $freelancer_profile_result = mysqli_query($conn, $freelancer_profile_sql);

    $freelancer_swing_sql = "SELECT * FROM `freelancer_swing` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC LIMIT 1";
    $freelancer_swing_result = mysqli_query($conn, $freelancer_swing_sql);
    $freelancer_swing_data = mysqli_fetch_assoc($freelancer_swing_result);
    $swing_status = $freelancer_swing_data['swing_status'];

    if($swing_status == 0)
    {
        $swing = "Not Set";
    }
    else if($swing_status == 1)
    {
        $swing = "Partially Available";
    }
    else if($swing_status == 2)
    {
        $swing = "Fully Available";
    }
    else if($swing_status == -1)
    {
        $swing = "Not Available";
    }
    else
    {
        $swing = "Not Set";
    }
    
    while ($freelancer_profile_data = mysqli_fetch_assoc($freelancer_profile_result))
    {
        $id = $freelancer_profile_data['id'];
        $email = $freelancer_profile_data['email'];
        $email_verified = $freelancer_profile_data['email_verified'];
        $country_name = $freelancer_profile_data['country_name'];
        $country_code = $freelancer_profile_data['country_code'];
        $number = $freelancer_profile_data['number'];
        $number_verified = $freelancer_profile_data['number_verified'];
        $technical = $freelancer_profile_data['technical'];
        $non_technical = $freelancer_profile_data['non_technical'];
        $writer = $freelancer_profile_data['writer'];
        $technical_form_filled = $freelancer_profile_data['technical_form_filled'];
        $technical_interview_conducted = $freelancer_profile_data['technical_interview_conducted'];
        $technical_agreement_sent = $freelancer_profile_data['technical_agreement_sent'];
        $technical_agreement_received = $freelancer_profile_data['technical_agreement_received'];
        $technical_is_approved = $freelancer_profile_data['technical_is_approved'];
        $non_technical_form_filled = $freelancer_profile_data['non_technical_form_filled'];
        $non_technical_interview_conducted = $freelancer_profile_data['non_technical_interview_conducted'];
        $non_technical_agreement_sent = $freelancer_profile_data['non_technical_agreement_sent'];
        $non_technical_agreement_received = $freelancer_profile_data['non_technical_agreement_received'];
        $non_technical_is_approved = $freelancer_profile_data['non_technical_is_approved'];
        $writer_form_filled = $freelancer_profile_data['writer_form_filled'];
        $writer_interview_conducted = $freelancer_profile_data['writer_interview_conducted'];
        $writer_agreement_sent = $freelancer_profile_data['writer_agreement_sent'];
        $writer_agreement_received = $freelancer_profile_data['writer_agreement_received'];
        $writer_is_approved = $freelancer_profile_data['writer_is_approved'];
        $is_active = $freelancer_profile_data['is_active'];
        $firstname = $freelancer_profile_data['firstname'];
        $lastname = $freelancer_profile_data['lastname'];
        $gender = $freelancer_profile_data['gender'];
        $whatsapp = $freelancer_profile_data['whatsapp'];
        $address = $freelancer_profile_data['address'];
        $street = $freelancer_profile_data['street'];
        $lastname = $freelancer_profile_data['lastname'];
        $city = $freelancer_profile_data['city'];
        $state = $freelancer_profile_data['state'];
        $pincode = $freelancer_profile_data['pincode'];


        $freelance_profile_array = array(
            'id' => $id,
            'email' => $email,
            'email_verified' => $email_verified,
            'country_name' => $country_name,
            'country_code' => $country_code,
            'number' => $number,
            'number_verified' => $number_verified,
            'technical' => array(
                'technical' => $technical,
                'technical_form_filled' => $technical_form_filled,
                'technical_interview_conducted' => $technical_interview_conducted,
                'technical_agreement_sent' => $technical_agreement_sent,
                'technical_agreement_received' => $technical_agreement_received,
                'technical_is_approved' => $technical_is_approved
            ),
            'non_technical' => array(
                'non_technical' => $non_technical,
                'non_technical_form_filled' => $non_technical_form_filled,
                'non_technical_interview_conducted' => $non_technical_interview_conducted,
                'non_technical_agreement_sent' => $non_technical_agreement_sent,
                'non_technical_agreement_received' => $non_technical_agreement_received,
                'non_technical_is_approved' => $non_technical_is_approved
            ),
            'writer' => array(
                'writer' => $writer,
                'writer_form_filled' => $writer_form_filled,
                'writer_interview_conducted' => $writer_interview_conducted,
                'writer_agreement_sent' => $writer_agreement_sent,
                'writer_agreement_received' => $writer_agreement_received,
                'writer_is_approved' => $writer_is_approved
            ),
            'is_active' => $is_active,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'gender' => $gender,
            'whatsapp' => $whatsapp,
            // 'swing_status' => $swing_status,
            'swing' => $swing,
            'address' => $address,
            'street' => $street,
            'city' => $city,
            'state' => $state,
            'pincode' => $pincode,
        );

        array_push($data_array, $freelance_profile_array);

        if ($technical == '1')
        {
            $freelancer_is_technical_sql = "SELECT `id`,`domains` , `assignment_type`  , `qualification` ,`working_hours`,`subject_tags`,`past_experience`,`work_links`,`linkedin`,`experience`,`past_work_files`,`resume`,`profile_photo`,`date_of_submission` FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC";
            $freelancer_is_technical_result = mysqli_query($conn, $freelancer_is_technical_sql);

            while ($freelancer_is_technical_data = mysqli_fetch_assoc($freelancer_is_technical_result))
            {
                $id = $freelancer_is_technical_data['id'];
                $domains = $freelancer_is_technical_data['domains'];

                $assignment_type = $freelancer_is_technical_data['assignment_type'];
                $assignment_type = json_decode($assignment_type);

                $qualification = $freelancer_is_technical_data['qualification'];
                $working_hours = $freelancer_is_technical_data['working_hours'];
                
                $subject_tags = $freelancer_is_technical_data['subject_tags'];
                $subject_tags = json_decode($subject_tags);

                $past_experience = $freelancer_is_technical_data['past_experience'];
                $work_links = $freelancer_is_technical_data['work_links'];
                $linkedin = $freelancer_is_technical_data['linkedin'];
                $experience = $freelancer_is_technical_data['experience'];
                $past_work_files = $freelancer_is_technical_data['past_work_files'];
                $resume = $freelancer_is_technical_data['resume'];
                $profile_photo = $freelancer_is_technical_data['profile_photo'];
                $date_of_submission = $freelancer_is_technical_data['date_of_submission'];

                $freelancer_is_technical_array = array(
                    'id' => $id,
                    'domains' => $domains,
                    'assignment_type' => $assignment_type,
                    'qualification' => $qualification,
                    'working_hours' => $working_hours,
                    'subject_tags' => $subject_tags,
                    'past_experience' => $past_experience,
                    'work_links' => $work_links,
                    'linkedin' => $linkedin,
                    'experience' => $experience,
                    'past_work_files' => $past_work_files,
                    'resume' => $resume,
                    'profile_photo' => $profile_photo,
                    'date_of_submission' => $date_of_submission
                );

                array_push($data_array, $freelancer_is_technical_array);
            }
        } 
        else if ($non_technical == '1')
        {
            $freelancer_non_technical_sql = "SELECT `id`,`domains` , `assignment_type`  , `qualification` ,`working_hours`,`subject_tags`,`past_experience`,`work_links`,`typing_speed`,`linkedin`,`experience`,`past_work_files`,`resume`,`profile_photo`,`date_of_submission` FROM `freelancers_nontechnical` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC";
            $freelancer_non_technical_result = mysqli_query($conn, $freelancer_non_technical_sql);

            while ($freelancer_non_technical_data = mysqli_fetch_assoc($freelancer_non_technical_result))
            {
                $id = $freelancer_non_technical_data['id'];
                $domains = $freelancer_non_technical_data['domains'];
                $assignment_type = $freelancer_non_technical_data['assignment_type'];
                $qualification = $freelancer_non_technical_data['qualification'];
                $working_hours = $freelancer_non_technical_data['working_hours'];
                $subject_tags = $freelancer_non_technical_data['subject_tags'];
                $past_experience = $freelancer_non_technical_data['past_experience'];
                $work_links = $freelancer_non_technical_data['work_links'];
                $typing_speed = $freelancer_non_technical_data['typing_speed'];
                $linkedin = $freelancer_non_technical_data['linkedin'];
                $experience = $freelancer_non_technical_data['experience'];
                $past_work_files = $freelancer_non_technical_data['past_work_files'];
                $resume = $freelancer_non_technical_data['resume'];
                $profile_photo = $freelancer_non_technical_data['profile_photo'];
                $date_of_submission = $freelancer_non_technical_data['date_of_submission'];

                $freelancer_non_technical_array = array(
                    'id' => $id,
                    'domains' => $domains,
                    'assignment_type' => $assignment_type,
                    'qualification' => $qualification,
                    'working_hours' => $working_hours,
                    'subject_tags' => $subject_tags,
                    'past_experience' => $past_experience,
                    'work_links' => $work_links,
                    'typing_speed' => $typing_speed,
                    'linkedin' => $linkedin,
                    'experience' => $experience,
                    'past_work_files' => $past_work_files,
                    'resume' => $resume,
                    'profile_photo' => $profile_photo,
                    'date_of_submission' => $date_of_submission
                );

                array_push($data_array, $freelancer_non_technical_array);
            }
        } 
        else if ($writer == '1')
        {
            $freelancer_writer_sql = "SELECT `id`,`domains` , `writing`  , `diagram` ,`ed`,`typing`,`art`,`writing_capacity`,`writing_1day_cost`,`writing_2day_cost`,`writing_3day_cost`,`writing_sample`,`diagram_cost`,`diagram_sample` ,`ed_cost`,`ed_sample`,`typing_cost`,`typing_speed`,`art_type_of_models`,`art_cost`,`art_sample`,`bio`,`profile_photo`,`date_of_submission`  FROM `freelancers_writer` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC";
            $freelancer_writer_result = mysqli_query($conn, $freelancer_writer_sql);

            while ($freelancer_writer_data = mysqli_fetch_assoc($freelancer_writer_result))
            {
                $id = $freelancer_writer_data['id'];
                $domains = $freelancer_writer_data['domains'];
                $writing = $freelancer_writer_data['writing'];
                $diagram = $freelancer_writer_data['diagram'];
                $ed = $freelancer_writer_data['ed'];
                $typing = $freelancer_writer_data['typing'];
                $art = $freelancer_writer_data['art'];
                $writing_capacity = $freelancer_writer_data['writing_capacity'];
                $writing_1day_cost = $freelancer_writer_data['writing_1day_cost'];
                $writing_2day_cost     = $freelancer_writer_data['writing_2day_cost	'];
                $writing_3day_cost = $freelancer_writer_data['writing_3day_cost'];
                $writing_sample = $freelancer_writer_data['writing_sample'];
                $diagram_cost = $freelancer_writer_data['diagram_cost'];
                $diagram_sample = $freelancer_writer_data['diagram_sample'];
                $ed_cost = $freelancer_writer_data['ed_cost'];
                $ed_sample = $freelancer_writer_data['ed_sample'];
                $typing_cost = $freelancer_writer_data['typing_cost'];
                $typing_speed = $freelancer_writer_data['typing_speed'];
                $art_type_of_models = $freelancer_writer_data['art_type_of_models'];
                $art_cost = $freelancer_writer_data['art_cost'];
                $art_sample = $freelancer_writer_data['art_sample'];
                $bio = $freelancer_writer_data['bio'];
                $profile_photo = $freelancer_writer_data['profile_photo'];
                $date_of_submission = $freelancer_writer_data['date_of_submission'];

                $freelancer_writer_array = array(
                    'id' => $id,
                    'domains' => $domains,
                    'writing' => $writing,
                    'diagram' => $diagram,
                    'ed' => $ed,
                    'typing' => $typing,
                    'art' => $art,
                    'writing_capacity' => $writing_capacity,
                    'writing_1day_cost' => $writing_1day_cost,
                    'writing_2day_cost' => $writing_2day_cost,
                    'writing_3day_cost' => $writing_3day_cost,
                    'writing_sample' => $writing_sample,
                    'diagram_cost' => $diagram_cost,
                    'diagram_sample' => $diagram_sample,
                    'ed_cost' => $ed_cost,
                    'ed_sample' => $ed_sample,
                    'typing_cost' => $typing_cost,
                    'typing_speed' => $typing_speed,
                    'art_type_of_models' => $art_type_of_models,
                    'art_cost' => $art_cost,
                    'art_sample' => $art_sample,
                    'bio' => $bio,
                    'profile_photo' => $profile_photo,
                    'date_of_submission' => $date_of_submission
                );

                array_push($data_array, $freelancer_writer_array);
            }
        }
    }

    echo json_encode($data_array);

    ?>