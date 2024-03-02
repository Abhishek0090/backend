<?php

    include_once 'old_connect.php';

    $freelancers_data = array();

    $get_all_freelancers_from_old_database = "SELECT * FROM `freelance`";
    $get_all_freelancers_from_old_database_result = mysqli_query($old_conn, $get_all_freelancers_from_old_database);


    while ($get_all_freelancers_from_old_database_row = mysqli_fetch_array($get_all_freelancers_from_old_database_result))
    {
        $freelancers_array = array (
            'id' => $get_all_freelancers_from_old_database_row['freelancer_id'],
            'firstname' => $get_all_freelancers_from_old_database_row['firstname'],
            'lastname' => $get_all_freelancers_from_old_database_row['lastname'],
            'email' => $get_all_freelancers_from_old_database_row['email'],
            'gender' => $get_all_freelancers_from_old_database_row['gender'],
            'country' => $get_all_freelancers_from_old_database_row['country'],
            'mobile' => $get_all_freelancers_from_old_database_row['mobile_number'],
            'whatsapp' => $get_all_freelancers_from_old_database_row['whatsapp_number'],
            'address' => $get_all_freelancers_from_old_database_row['address'],
            'street' => $get_all_freelancers_from_old_database_row['street'],
            'city' => $get_all_freelancers_from_old_database_row['city'],
            'state' => $get_all_freelancers_from_old_database_row['state'],
            'postalcode' => $get_all_freelancers_from_old_database_row['postalcode'],
            'pan_number' => $get_all_freelancers_from_old_database_row['pan_number'],
            'date_of_submission' => $get_all_freelancers_from_old_database_row['date_of_submission'],
            'domain' => $get_all_freelancers_from_old_database_row['domain'],
            'subject_tags' => $get_all_freelancers_from_old_database_row['subject_tags'],
            'assignment_type' => $get_all_freelancers_from_old_database_row['assignment_type'],
            'qualification' => $get_all_freelancers_from_old_database_row['qualification'],
            'working_hours' => $get_all_freelancers_from_old_database_row['working_hours'],
            'past_experience' => $get_all_freelancers_from_old_database_row['past_experience'],
            'past_work' => $get_all_freelancers_from_old_database_row['past_work'],
            'work_links' => $get_all_freelancers_from_old_database_row['work_links'],
            'linkedin' => $get_all_freelancers_from_old_database_row['linkedin'],
            'freelance_experience' => $get_all_freelancers_from_old_database_row['freelance_experience'],
            'resume' => $get_all_freelancers_from_old_database_row['resume'],
            'approved' => $get_all_freelancers_from_old_database_row['approved'],
            'number_of_assignments' => $get_all_freelancers_from_old_database_row['number_of_assignments'],
            'level' => $get_all_freelancers_from_old_database_row['level'],
            'form-filled' => $get_all_freelancers_from_old_database_row['form_filled'],
            'interview_conducted' => $get_all_freelancers_from_old_database_row['interview_conducted'],
            'send_agreement' => $get_all_freelancers_from_old_database_row['send_agreement'],
            'agreement_received' => $get_all_freelancers_from_old_database_row['agreement_received'],
            'password' => $get_all_freelancers_from_old_database_row['password'],
        );

        array_push($freelancers_data, $freelancers_array);
    }

    $fp = fopen('freelancers_data.json', 'w');
    $fwrite = fwrite($fp, json_encode($freelancers_data));
    $fclose = fclose($fp);


    // echo json_encode($assignment_data);
    var_dump($fp);
    echo "<br>";
    var_dump($fwrite);
    echo "<br>";
    var_dump($fclose);

?>