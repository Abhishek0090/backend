<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];

    $freelancer_array = array();

    $get_map_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id' ORDER BY `id` DESC LIMIT 1";
    $get_map_details_result = mysqli_query($conn, $get_map_details_sql);
    $get_map_details_num = mysqli_num_rows($get_map_details_result);
    $get_map_details_row = mysqli_fetch_assoc($get_map_details_result);

    if($get_map_details_num == 0)
    {
        echo json_encode(array(
            'message' => 'No Freelancer Found'
        ));
        exit();
    }

    $email = $get_map_details_row['email'];
    $email_verified = $get_map_details_row['email_verified'];
    $country_name = $get_map_details_row['country_name'];
    $country_code = $get_map_details_row['country_code'];
    $number = $get_map_details_row['number'];
    $number_verified = $get_map_details_row['number_verified'];
    $technical = $get_map_details_row['technical'];
    $non_technical = $get_map_details_row['non technical'];
    $writer = $get_map_details_row['writer'];
    
    $technical_form_filled = $get_map_details_row['technical_form_filled'];
    $technical_interview_conducted = $get_map_details_row['technical_interview_conducted'];
    $technical_agreement_sent = $get_map_details_row['technical_agreement_sent'];
    $technical_agreement_received = $get_map_details_row['technical_agreement_received'];
    $technical_is_approved = $get_map_details_row['technical_is_approved'];

    $non_technical_form_filled = $get_map_details_row['non_technical_form_filled'];
    $non_technical_interview_conducted = $get_map_details_row['non_technical_interview_conducted'];
    $non_technical_agreement_sent = $get_map_details_row['non_technical_agreement_sent'];
    $non_technical_agreement_received = $get_map_details_row['non_technical_agreement_received'];
    $non_technical_is_approved = $get_map_details_row['non_technical_is_approved'];

    $writer_form_filled = $get_map_details_row['writer_form_filled'];
    $writer_interview_conducted = $get_map_details_row['writer_interview_conducted'];
    $writer_agreement_sent = $get_map_details_row['writer_agreement_sent'];
    $writer_agreement_received = $get_map_details_row['writer_agreement_received'];
    $writer_is_approved = $get_map_details_row['writer_is_approved'];

    $is_active = $get_map_details_row['is_active'];
    
    $firstname = $get_map_details_row['firstname'];
    $lastname = $get_map_details_row['lastname'];
    $gender = $get_map_details_row['gender'];
    $whatsapp = $get_map_details_row['whatsapp'];
    $address = $get_map_details_row['address'];
    $street = $get_map_details_row['street'];
    $city = $get_map_details_row['city'];
    $state = $get_map_details_row['state'];
    $pincode = $get_map_details_row['pincode'];
    $agreed = $get_map_details_row['agreed'];
    $password = $get_map_details_row['password'];

    $freelancer_map_array = array(
        'array' => "Map Array",
        'freelancer_id' => $freelancer_id,
        'email' => $email,
        'email_verified' => $email_verified,
        'country_name' => $country_name,
        'country_code' => $country_code,
        'number' => $number,
        'number_verified' => $number_verified,
        'technical' => $technical,
        'non_technical' => $non_technical,
        'writer' => $writer,
        'technical_form_filled' => $technical_form_filled,
        'technical_interview_conducted' => $technical_interview_conducted,
        'technical_agreement_sent' => $technical_agreement_sent,
        'technical_agreement_received' => $technical_agreement_received,
        'technical_is_approved' => $technical_is_approved,
        'non_technical_form_filled' => $non_technical_form_filled,
        'non_technical_interview_conducted' => $non_technical_interview_conducted,
        'non_technical_agreement_sent' => $non_technical_agreement_sent,
        'non_technical_agreement_received' => $non_technical_agreement_received,
        'non_technical_is_approved' => $non_technical_is_approved,
        'writer_form_filled' => $writer_form_filled,
        'writer_interview_conducted' => $writer_interview_conducted,
        'writer_agreement_sent' => $writer_agreement_sent,
        'writer_agreement_received' => $writer_agreement_received,
        'writer_is_approved' => $writer_is_approved,
        'is_active' => $is_active,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'gender' => $gender,
        'whatsapp' => $whatsapp,
        'address' => $address,
        'street' => $street,
        'city' => $city,
        'state' => $state,
        'pincode' => $pincode,
        'agreed' => $agreed,
        'password' => $password
    );

    array_push($freelancer_array, $freelancer_map_array);

    $technical_array = array(
        'array' => "Technical Array",
    );

    if($technical == 1)
    {
        $technical_freelancer_details = "SELECT * FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC LIMIT 1";
        $technical_freelancer_details_result = mysqli_query($conn, $technical_freelancer_details);
        $technical_freelancer_details_row = mysqli_fetch_assoc($technical_freelancer_details_result);

        $id = $technical_freelancer_details_row['id'];
        $domains = $technical_freelancer_details_row['domains'];
        $assignment_type = $technical_freelancer_details_row['assignment_type'];
        $qualification = $technical_freelancer_details_row['qualification'];
        $working_hours = $technical_freelancer_details_row['working_hours'];
        $subject_tags = $technical_freelancer_details_row['subject_tags'];
        $past_experience = $technical_freelancer_details_row['past_experience'];
        $work_links = $technical_freelancer_details_row['work_links'];
        $linkedin = $technical_freelancer_details_row['linkedin'];
        $experience = $technical_freelancer_details_row['experience'];
        $past_work_files = $technical_freelancer_details_row['past_work_files'];
        $resume = $technical_freelancer_details_row['resume'];
        $profile_photo = $technical_freelancer_details_row['profile_photo'];
        $date_of_submission = $technical_freelancer_details_row['date_of_submission'];

        $technical_array = array(
            'array' => "Technical Array",
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
    }

    array_push($freelancer_array, $technical_array);

    $non_technical_array = array(
        'array' => "Non Technical Array",
    );

    if($non_technical == 1)
    {
        $non_technical_freelancer_details = "SELECT * FROM `freelancers_nontechnical` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC LIMIT 1";
        $non_technical_freelancer_details_result = mysqli_query($conn, $non_technical_freelancer_details);
        $non_technical_freelancer_details_row = mysqli_fetch_assoc($non_technical_freelancer_details_result);

        $id = $non_technical_freelancer_details_row['id'];
        $domains = $non_technical_freelancer_details_row['domains'];
        $assignment_type = $non_technical_freelancer_details_row['assignment_type'];
        $qualification = $non_technical_freelancer_details_row['qualification'];
        $working_hours = $non_technical_freelancer_details_row['working_hours'];
        $subject_tags = $non_technical_freelancer_details_row['subject_tags'];
        $past_experience = $non_technical_freelancer_details_row['past_experience'];
        $typing_speed = $non_technical_freelancer_details_row['typing_speed'];
        $work_links = $non_technical_freelancer_details_row['work_links'];
        $linkedin = $non_technical_freelancer_details_row['linkedin'];
        $experience = $non_technical_freelancer_details_row['experience'];
        $past_work_files = $non_technical_freelancer_details_row['past_work_files'];
        $resume = $non_technical_freelancer_details_row['resume'];
        $profile_photo = $non_technical_freelancer_details_row['profile_photo'];
        $date_of_submission = $non_technical_freelancer_details_row['date_of_submission'];

        $non_technical_array = array(
            'array' => "Non Technical Array",
            'id' => $id,
            'domains' => $domains,
            'assignment_type' => $assignment_type,
            'qualification' => $qualification,
            'working_hours' => $working_hours,
            'subject_tags' => $subject_tags,
            'past_experience' => $past_experience,
            'typing_speed' => $typing_speed,
            'work_links' => $work_links,
            'linkedin' => $linkedin,
            'experience' => $experience,
            'past_work_files' => $past_work_files,
            'resume' => $resume,
            'profile_photo' => $profile_photo,
            'date_of_submission' => $date_of_submission
        );
    }

    array_push($freelancer_array, $non_technical_array);

    $writer_array = array(
        'array' => "Writer Array",
    );

    if($writer == 1)
    {
        $writer_freelancer_details = "SELECT * FROM `freelancers_writer` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC LIMIT 1";
        $writer_freelancer_details_result = mysqli_query($conn, $writer_freelancer_details);
        $writer_freelancer_details_row = mysqli_fetch_assoc($writer_freelancer_details_result);

        $id = $writer_freelancer_details_row['id'];
        $domains = $writer_freelancer_details_row['domains'];
        $writing = $writer_freelancer_details_row['writing'];
        $diagram = $writer_freelancer_details_row['diagram'];
        $ed = $writer_freelancer_details_row['ed'];
        $typing = $writer_freelancer_details_row['typing'];
        $art = $writer_freelancer_details_row['art'];
        $writing_capacity = $writer_freelancer_details_row['writing_capacity'];
        $writing_1day_cost = $writer_freelancer_details_row['writing_1day_cost'];
        $writing_2day_cost = $writer_freelancer_details_row['writing_2day_cost'];
        $writing_3day_cost = $writer_freelancer_details_row['writing_3day_cost'];
        $writing_sample = $writer_freelancer_details_row['writing_sample'];
        $diagram_cost = $writer_freelancer_details_row['diagram_cost'];
        $diagram_sample = $writer_freelancer_details_row['diagram_sample'];
        $ed_cost = $writer_freelancer_details_row['ed_cost'];
        $ed_sample = $writer_freelancer_details_row['ed_sample'];
        $typing_cost = $writer_freelancer_details_row['typing_cost'];
        $typing_speed = $writer_freelancer_details_row['typing_speed'];
        $art_type_of_models = $writer_freelancer_details_row['art_type_of_models'];
        $art_cost = $writer_freelancer_details_row['art_cost'];
        $art_sample = $writer_freelancer_details_row['art_sample'];
        $bio = $writer_freelancer_details_row['bio'];
        $profile_photo = $writer_freelancer_details_row['profile_photo'];
        $date_of_submission = $writer_freelancer_details_row['date_of_submission'];

        $writer_array = array(
            'array' => "Writer Array",
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
    }

    array_push($freelancer_array, $writer_array);

    $freelancer_array = json_encode($freelancer_array);
    $freelancer_array = str_replace("'", " \' ", $freelancer_array);

    $freelancer_map_array = json_encode($freelancer_map_array);
    $freelancer_map_array = str_replace("'", " \' ", $freelancer_map_array);

    $technical_array = json_encode($technical_array);
    $technical_array = str_replace("'", " \' ", $technical_array);

    $non_technical_array = json_encode($non_technical_array);
    $non_technical_array = str_replace("'", " \' ", $non_technical_array);

    $writer_array = json_encode($writer_array);
    $writer_array = str_replace("'", " \' ", $writer_array);

    $insert_into_dump = "INSERT INTO `dump_freelancer` (`freelancer_id`, `map_array`, `technical_array`, `non_technical_array`, `writer_array`, `freelancer_array`) VALUES ('$freelancer_id', '$freelancer_map_array', '$technical_array', '$non_technical_array', '$writer_array', '$freelancer_array')";
    $insert_into_dump_result = mysqli_query($conn, $insert_into_dump);

    $delete_map_sql = "DELETE FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $delete_map_result = mysqli_query($conn, $delete_map_sql);

    $delete_technical_sql = "DELETE FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id'";
    $delete_technical_result = mysqli_query($conn, $delete_technical_sql);

    $delete_non_technical_sql = "DELETE FROM `freelancers_non_technical` WHERE `freelancer_id` = '$freelancer_id'";
    $delete_non_technical_result = mysqli_query($conn, $delete_non_technical_sql);

    $delete_writer_sql = "DELETE FROM `freelancers_writer` WHERE `freelancer_id` = '$freelancer_id'";
    $delete_writer_result = mysqli_query($conn, $delete_writer_sql);

    // echo json_encode($freelancer_array);

    echo json_encode(array(
        // 'array' => "Freelancer Array",
        'status' => 200,
        'freelancer_id' => $freelancer_id,
        'freelancer_array' => $freelancer_array,
        'message' => "Freelancer Deleted Successfully"
        // 'technical_array' => $technical_array,
        // 'non_technical_array' => $non_technical_array,
        // 'writer_array' => $writer_array,
        // 'dump_sql' => $insert_into_dump,
        // 'dump_result' => $insert_into_dump_result,
    ));

?>