<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_array = array();
    $freelancer_data = array();

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_marks_out_of_100 = 0;
    $total_marks_category = "";
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;

    $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `technical` = 1 OR `non technical` = 1 ORDER BY `id` DESC";
    $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
    $get_freelancer_details_count = mysqli_num_rows($get_freelancer_details_result);

    while($get_freelancer_details_row = mysqli_fetch_array($get_freelancer_details_result))
    {
        $freelancer_marks_obtained = 0;
        $freelancer_marks_out_of = 0;
        $freelancer_marks_out_of_100 = 0;
        $freelancer_marks_category = "";
        $freelancer_resit = 0;
        $freelancer_passing = 0;
        $freelancer_merit = 0;
        $freelancer_distinction = 0;

        $freelancer_id = $get_freelancer_details_row['id'];
        $freelancer_name = $get_freelancer_details_row['firstname'] . " " . $get_freelancer_details_row['lastname'];
        $freelancer_email = $get_freelancer_details_row['email'];
        $freelancer_number = $get_freelancer_details_row['number'];
        $freelancer_whatsapp = $get_freelancer_details_row['whatsapp'];
        $freelancer_country_code = $get_freelancer_details_row['country_code'];

        $technical = $get_freelancer_details_row['technical'];
        $non_technical = $get_freelancer_details_row['non technical'];

        if($technical == 1)
        {
            $freelancer_domain = "Technical";
        }
        else if($non_technical == 1)
        {
            $freelancer_domain = "Non Technical";
        }
        
        if($get_freelancer_details_row['technical'] == 1)
        {
            $get_details_sql = "SELECT * FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id'";
            $get_details_result = mysqli_query($conn, $get_details_sql);
            $get_details_row = mysqli_fetch_array($get_details_result);

            $subject_tags = $get_details_row['subject_tags'];
            $subject_tags = json_decode($subject_tags);

            if($get_freelancer_details_row['technical_is_approved'] == -1)
            {
                $freelancer_status = "Rejected";
            }
            else
            {
                if($get_freelancer_details_row['technical_is_approved'] == 1)
                {
                    $freelancer_status = "Technical Approved";
                }
                else
                {
                    if($get_freelancer_details_row['technical_agreement_received'] == 1)
                    {
                        $freelancer_status = "Agreement Received";
                    }
                    else
                    {
                        if($get_freelancer_details_row['technical_agreement_sent'] == 1)
                        {
                            $freelancer_status = "Agreement Sent";
                        }
                        else
                        {
                            if($get_freelancer_details_row['technical_interview_conducted'] == 1)
                            {
                                $freelancer_status = "Interview Conducted";
                            }
                            else
                            {
                                if($get_freelancer_details_row['technical_form_filled'] == 1)
                                {
                                    $freelancer_status = "Form Filled";
                                }
                                else
                                {
                                    $freelancer_status = "Error";
                                }
                            }
                        }
                    }
                }
            }
            
        }
        elseif($get_freelancer_details_row['non technical'] == 1)
        {
            $get_details_sql = "SELECT * FROM `freelancers_nontechnical` WHERE `freelancer_id` = '$freelancer_id'";
            $get_details_result = mysqli_query($conn, $get_details_sql);
            $get_details_row = mysqli_fetch_array($get_details_result);

            $subject_tags = $get_details_row['subject_tags'];
            $subject_tags = json_decode($subject_tags);

            if($get_freelancer_details_row['non_technical_is_approved'] == -1)
            {
                $freelancer_status = "Rejected";
            }
            else
            {
                if($get_freelancer_details_row['non_technical_is_approved'] == 1)
                {
                    $freelancer_status = "Non Technical Approved";
                }
                else
                {
                    if($get_freelancer_details_row['non_technical_agreement_received'] == 1)
                    {
                        $freelancer_status = "Agreement Received";
                    }
                    else
                    {
                        if($get_freelancer_details_row['non_technical_agreement_sent'] == 1)
                        {
                            $freelancer_status = "Agreement Sent";
                        }
                        else
                        {
                            if($get_freelancer_details_row['non_technical_interview_conducted'] == 1)
                            {
                                $freelancer_status = "Interview Conducted";
                            }
                            else
                            {
                                if($get_freelancer_details_row['non_technical_form_filled'] == 1)
                                {
                                    $freelancer_status = "Form Filled";
                                }
                                else
                                {
                                    $freelancer_status = "Error";
                                }
                            }
                        }
                    }
                }
            }
        }

        $freelancer_assigned_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = '$freelancer_id' AND `status` = 1";
        $freelancer_assigned_result = mysqli_query($conn, $freelancer_assigned_sql);
        $freelancer_assigned_count = mysqli_num_rows($freelancer_assigned_result);

        while($freelancer_assigned_data = mysqli_fetch_assoc($freelancer_assigned_result))
        {
            $assignment_id = $freelancer_assigned_data['assignment_id'];

            $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
            $assignment_details_result = mysqli_query($conn, $assignment_details_sql);
            $assignment_details_data = mysqli_fetch_assoc($assignment_details_result);
            
            $marks_obtained = $assignment_details_data['marks_obtained'];
            $marks_out_of = $assignment_details_data['marks_out_of'];
            $feedback = $assignment_details_data['feedback'];
            $marks_added_on = $assignment_details_data['marks_added_on'];

            if($marks_obtained != null)
            {
                $freelancer_marks_obtained += $marks_obtained;
                $freelancer_marks_out_of += $marks_out_of;
                $freelancer_marks_out_of_100 = $freelancer_marks_obtained * 100 / $freelancer_marks_out_of;
                switch($freelancer_marks_out_of_100)
                {
                    case ($freelancer_marks_out_of_100 >= 71):
                        $freelancer_marks_category = "Distinction";
                        $freelancer_distinction++;
                        break;
                    case ($freelancer_marks_out_of_100 >= 61 && $freelancer_marks_out_of_100 <= 70):
                        $freelancer_marks_category = "Merit";
                        $freelancer_merit++;
                        break;
                    case ($freelancer_marks_out_of_100 >= 51 && $freelancer_marks_out_of_100 <= 60):
                        $freelancer_marks_category = "Passing";
                        $freelancer_passing++;
                        break;
                    case ($freelancer_marks_out_of_100 >= 0 && $freelancer_marks_out_of_100 <= 50):
                        $freelancer_marks_category = "Resit";
                        $freelancer_resit++;
                        break;
                }
            }
            $total_marks_obtained += $freelancer_marks_obtained;
            $total_marks_out_of += $freelancer_marks_out_of;
            $total_marks_out_of_100 = $total_marks_obtained * 100 / $total_marks_out_of;
            switch($total_marks_out_of_100)
            {
                case ($total_marks_out_of_100 >= 71):
                    $total_marks_category = "Distinction";
                    $total_distinction++;
                    break;
                case ($total_marks_out_of_100 >= 61 && $total_marks_out_of_100 <= 70):
                    $total_marks_category = "Merit";
                    $total_merit++;
                    break;
                case ($total_marks_out_of_100 >= 51 && $total_marks_out_of_100 <= 60):
                    $total_marks_category = "Passing";
                    $total_passing++;
                    break;
                case ($total_marks_out_of_100 >= 0 && $total_marks_out_of_100 <= 50):
                    $total_marks_category = "Resit";
                    $total_resit++;
                    break;
            }
        }

        
        $data = array(
            'array' => "Freelancer Array",
            'id' => $freelancer_id,
            'name' => $freelancer_name,
            'email' => $freelancer_email,
            'phone' => $freelancer_number,
            'country_code' => $freelancer_country_code,
            'whatsapp' => $freelancer_whatsapp,
            'domain' => $freelancer_domain,
            'status' => $freelancer_status,
            'subject_tags' => $subject_tags,
            'freelancer_marks_obtained' => $freelancer_marks_obtained,
            'freelancer_marks_out_of' => $freelancer_marks_out_of,
            'freelancer_marks_out_of_100' => $freelancer_marks_out_of_100,
            'freelancer_marks_category' => $freelancer_marks_category,
            'freelancer_resit' => $freelancer_resit,
            'freelancer_passing' => $freelancer_passing,
            'freelancer_merit' => $freelancer_merit,
            'freelancer_distinction' => $freelancer_distinction,
        );

        // array_push($freelancer_array, $data);
        array_push($freelancer_data, $data);

        // $freelancer_marks_obtained = 0;
        // $freelancer_marks_out_of = 0;
        // $freelancer_resit = 0;
        // $freelancer_passing = 0;
        // $freelancer_merit = 0;
        // $freelancer_distinction = 0;

    }

    $marks_array = array(
        'array' => "Marks Array",
        'total_marks_obtained' => $total_marks_obtained,
        'total_marks_out_of' => $total_marks_out_of,
        'total_marks_out_of_100' => $total_marks_out_of_100,
        'total_marks_category' => $total_marks_category,
        'total_resit' => $total_resit,
        'total_passing' => $total_passing,
        'total_merit' => $total_merit,
        'total_distinction' => $total_distinction,
    );
    // array_push($freelancer_array, $marks_array);

    $freelancer_array = array(
        "freelancer_array" => $freelancer_data,
        "marks_array" => $marks_array
    );

    echo json_encode($freelancer_array);
    
?>