<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;

    $map_array = array();
    $assignment_map_sql = "SELECT * FROM `assignment_map` ORDER BY id DESC";    
    $assignment_map_result = mysqli_query($conn, $assignment_map_sql);
    while($assignment_map_data = mysqli_fetch_array($assignment_map_result))
    {
        $assignment_id = $assignment_map_data['id'];
        $assignment_domain = $assignment_map_data['domain'];

        $check_assignment_in_affiliate_data_sql = "SELECT * FROM `affiliate_payments` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
        $check_assignment_in_affiliate_data_result = mysqli_query($conn, $check_assignment_in_affiliate_data_sql);
        $check_assignment_in_affiliate_data_row = mysqli_fetch_assoc($check_assignment_in_affiliate_data_result);
        $check_assignment_in_affiliate_data_number = mysqli_num_rows($check_assignment_in_affiliate_data_result);
        if($check_assignment_in_affiliate_data_number == 1)
        {
            if($assignment_domain == "Freelancer" || $assignment_domain == "Freelancer Programming" || $assignment_domain == "Freelancer Academic Writing" || $assignment_domain == "Freelancer Professional Writing")
            {
                $get_assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_details_result = mysqli_query($conn, $get_assignment_details_sql);
                $get_assignment_details_data = mysqli_fetch_assoc($get_assignment_details_result);
                
                $user_id = $assignment_map_data['user_id'];
                $get_user_details = "SELECT * FROM `users` WHERE `id` = '$user_id'";
                $get_user_details_result = mysqli_query($conn, $get_user_details);
                $get_user_details_data = mysqli_fetch_assoc($get_user_details_result);
                
                $user_name = $get_user_details_data['firstname'] . " " . $get_user_details_data['lastname'];
                $is_select = $get_user_details_data['is_select'];
                
                $affiliate_code_by = $get_user_details_data['affiliate_code_by'];
                if($affiliate_code_by != null)
                {
                    $affiliate_code_by_sql = "SELECT * FROM `users` WHERE `id` = '$affiliate_code_by'";
                    $affiliate_code_by_result = mysqli_query($conn, $affiliate_code_by_sql);
                    $affiliate_code_by_data = mysqli_fetch_assoc($affiliate_code_by_result);
                    $affiliate_code_by_name = $affiliate_code_by_data['firstname'] . " " . $affiliate_code_by_data['lastname'];

                    // $affiliate_data = array(
                    //     'affiliate_code_by' => $affiliate_code_by,
                    //     'affiliate_code_by_name' => $affiliate_code_by_name,
                    // );

                    $affiliate_payments_data = "SELECT * FROM `affiliate_payments` WHERE `assignment_id` = $assignment_id ORDER BY `id` DESC LIMIT 1";
                    $affiliate_payments_result = mysqli_query($conn, $affiliate_payments_data);
                    $affiliate_payments_row = mysqli_fetch_assoc($affiliate_payments_result);
                    $affiliate_payments_row_number = mysqli_num_rows($affiliate_payments_result);
                    if($affiliate_payments_row_number == 1)
                    {
                        $affiliate_payments_status = $affiliate_payments_row['status'];
                        $affiliate_payments_amount = $affiliate_payments_row['amount'];
                        $affiliate_payments_added_on = $affiliate_payments_row['added_on'];
                        $affiliate_payments_paid_on = $affiliate_payments_row['paid_on'];
                        if($affiliate_payments_paid_on == null)
                        {
                            $paid_status = "Unpaid";
                        }
                        else
                        {
                            $paid_status = "Paid";
                        }
                    }
                    else
                    {
                        $affiliate_payments_status = "null";
                        $affiliate_payments_amount = "null";
                        $affiliate_payments_added_on = "null";
                        $affiliate_payments_paid_on = "null";
                        $paid_status = "null";
                    }

                    $affiliate_data = array(
                        'affiliate_code_by' => $affiliate_code_by,
                        'affiliate_code_by_name' => $affiliate_code_by_name,
                        'affiliate_payments_status' => $affiliate_payments_status,
                        'affiliate_payments_amount' => $affiliate_payments_amount,
                        'affiliate_payments_added_on' => $affiliate_payments_added_on,
                        'affiliate_payments_paid_on' => $affiliate_payments_paid_on,
                        'paid_status' => $paid_status,
                    );

                    // move all code here
                    $status = "";
                    if($get_assignment_details_data['resit'] == 1)
                    {
                        $status = "Resit";
                    }
                    else if($get_assignment_details_data['lost'] == 1)
                    {
                        $status = "Lost";
                    }
                    else if($get_assignment_details_data['review_recieved'] == 1)
                    {
                        $status = "Review Received";
                    }
                    else if($get_assignment_details_data['completed'] == 1)
                    {
                        $status = "Completed";
                    }
                    else if($get_assignment_details_data['assigned_to_freelancer'] == 1)
                    {
                        $status = "Assigned to Freelancer";
                    }
                    else if($get_assignment_details_data['assigned_to_pm'] == 1)
                    {
                        $status = "Assigned to PM";
                    }
                    else if($get_assignment_details_data['under_process'] == 1)
                    {
                        $status = "Under Process";
                    }
                    else if($get_assignment_details_data['posted'] == 1)
                    {
                        $status = "Posted";
                    }
                    
                    $assignment_stream = $get_assignment_details_data['stream'];
                    if($assignment_stream == "Engineering")
                    {
                        $assignment_domain = "Technical";
                    }
                    else
                    {
                        $assignment_domain = "Non-Technical";
                    }
                    
                    $pm_id = $get_assignment_details_data['project_manager'];
                    if($pm_id != null)
                    {
                        $pm_name = "PM";
                        // query to get pm details
                        $pm_details = "SELECT * FROM `team` WHERE `id` = '$pm_id'";
                        $pm_details_result = mysqli_query($conn, $pm_details);
                        $pm_details_data = mysqli_fetch_assoc($pm_details_result);
                        $pm_name = $pm_details_data['name'];
                    }
                    else
                    {
                        $pm_name = "null";
                    }
                    
                    $freelancers_array = array();
                    $get_assigned_freelancers_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = '$assignment_id' AND `status` = 1 ORDER BY id DESC";
                    $get_assigned_freelancers_result = mysqli_query($conn, $get_assigned_freelancers_sql);
                    while($get_assigned_freelancers_data = mysqli_fetch_array($get_assigned_freelancers_result))
                    {
                        $freelancer_id = $get_assigned_freelancers_data['freelancer_id'];
                        $freelancer_array = array(
                            'id' => $freelancer_id,
                        );
                        // array_push($freelancers_array, $freelancer_array);
                        array_push($freelancers_array, $freelancer_id);
                    }
                    
                    $marks_obtained = $get_assignment_details_data['marks_obtained'];
                    $marks_out_of = $get_assignment_details_data['marks_out_of'];
                    
                    
                    // echo json_encode($assignment_id);

                    if($marks_out_of == null)
                    {
                        $marks_category = "Marks not Received";
                    }
                    else
                    {
                        if($marks_out_of != 100)
                        {
                            // convert to 100
                            $out_of_100 = $marks_obtained * 100 / $marks_out_of;
                            
                            switch($out_of_100)
                            {
                                case ($out_of_100 >= 71):
                                    $marks_category = "Distinction";
                                    $total_distinction++;
                                    break;
                                case ($out_of_100 >= 61 && $out_of_100 <= 70):
                                    $marks_category = "Merit";
                                    $total_merit++;
                                    break;
                                case ($out_of_100 >= 51 && $out_of_100 <= 60):
                                    $marks_category = "Passing";
                                    $total_passing++;
                                    break;
                                case ($out_of_100 >= 0 && $out_of_100 <= 50):
                                    $marks_category = "Resit";
                                    $total_resit++;
                                    break;
                            }
                        }
                        if($marks_out_of == 100)
                        {
                            switch($marks_obtained)
                            {
                                case ($marks_obtained >= 71):
                                    $marks_category = "Distinction";
                                    $total_distinction++;
                                    break;
                                case ($marks_obtained >= 61 && $marks_obtained <= 70):
                                    $marks_category = "Merit";
                                    $total_merit++;
                                    break;
                                case ($marks_obtained >= 51 && $marks_obtained <= 60):
                                    $marks_category = "Passing";
                                    $total_passing++;
                                    break;
                                case ($marks_obtained >= 0 && $marks_obtained <= 50):
                                    $marks_category = "Resit";
                                    $total_resit++;
                                    break;
                            }
                        }

                        $total_marks_obtained += $marks_obtained;
                        $total_marks_out_of += $marks_out_of;
                        $total_marks_out_of_100 = $total_marks_obtained * 100 / $total_marks_out_of;
                        
                        switch($total_marks_out_of_100)
                        {
                            case ($total_marks_out_of_100 >= 71):
                                $total_marks_category = "Distinction";
                                break;
                            case ($total_marks_out_of_100 >= 61 && $total_marks_out_of_100 <= 70):
                                $total_marks_category = "Merit";
                                break;
                            case ($total_marks_out_of_100 >= 51 && $total_marks_out_of_100 <= 60):
                                $total_marks_category = "Passing";
                                break;
                            case ($total_marks_out_of_100 >= 0 && $total_marks_out_of_100 <= 50):
                                $total_marks_category = "Resit";
                                break;
                        }
                    }

                    $assignment_array = array(
                        'id' => $assignment_id,
                        'user_id' => $user_id,
                        'user_name' => $user_name,
                        'is_select' => $is_select,
                        'affiliate_data' => $affiliate_data,
                        'stream' => $get_assignment_details_data['stream'],
                        'domain' => $assignment_domain,
                        'title' => $get_assignment_details_data['title'],
                        'description' => $get_assignment_details_data['description'],
                        'deadline' => $get_assignment_details_data['deadline'],
                        'budget' => $get_assignment_details_data['budget'],
                        'status' => $status,
                        'marks_obtained' => $get_assignment_details_data['marks_obtained'],
                        'marks_out_of' => $get_assignment_details_data['marks_out_of'],
                        'marks_category' => $marks_category,
                        'feedback' => $get_assignment_details_data['feedback'],
                        'marks_added_on' => $get_assignment_details_data['marks_added_on'],
                        'pm_id' => $get_assignment_details_data['project_manager'],
                        'pm_name' => $pm_name,
                        'freelancers' => $freelancers_array,
                    );
                    array_push($map_array, $assignment_array);
                }
                else
                {
                    $affiliate_code_by_name = "null";
                }
                
            }
        }
        
        
    }

    echo json_encode(array(
        "map_array" => $map_array,
        "total_marks_obtained" => $total_marks_obtained,
        "total_marks_out_of" => $total_marks_out_of,
        "total_marks_out_of_100" => $total_marks_out_of_100,
        "total_marks_category" => $total_marks_category,
        "total_resit" => $total_resit,
        "total_passing" => $total_passing,
        "total_merit" => $total_merit,
        "total_distinction" => $total_distinction,
    ));
?>