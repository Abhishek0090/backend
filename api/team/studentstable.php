<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data_array = array();

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_marks_out_of_100 = 0;
    $total_marks_category = "";
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;

    $students_table_sql = "SELECT * FROM `users` ORDER BY `id` DESC"; 
    $students_table_result = mysqli_query($conn, $students_table_sql); 
    while($students_table_data = mysqli_fetch_assoc($students_table_result))
    {

        $total_marks_obtained = 0;
        $total_marks_out_of = 0;
        $total_marks_out_of_100 = 0;
        $total_marks_category = "";
        $total_resit = 0;
        $total_passing = 0;
        $total_merit = 0;
        $total_distinction = 0;
    
        $id = $students_table_data['id'];
        $firstname = $students_table_data['firstname'];
        $lastname = $students_table_data['lastname'];
        $college = $students_table_data['college'];
        $email = $students_table_data['email'];
        $country_name = $students_table_data['country_name'];
        $country_code = $students_table_data['country_code']; 
        $number = $students_table_data['number'];
        $is_select = $students_table_data['is_select'];
        $utm_data = $students_table_data['utm_data'];
        $utm_data = json_decode($utm_data);

        if($is_select == 1)
        {
            $get_select_details_sql = "SELECT * FROM `users_select` WHERE `user_id` = '$id'";
            $get_select_details_result = mysqli_query($conn, $get_select_details_sql) or die(mysqli_error($conn));
            $get_select_details_row = mysqli_fetch_assoc($get_select_details_result);

            $addition_date = $get_select_details_row['addition_date'];
            $expiry_date = $get_select_details_row['expiry_date'];
        }

        $get_assignment_map_sql = "SELECT * FROM `assignment_map` WHERE `user_id` = '$id' ORDER BY `id` DESC";
        $get_assignment_map_result = mysqli_query($conn, $get_assignment_map_sql);
        while($get_assignment_map_row = mysqli_fetch_assoc($get_assignment_map_result))
        {
            $assignment_id = $get_assignment_map_row['id'];
            $assignment_domain = $get_assignment_map_row['domain'];
    
            if($assignment_domain == "Freelancer" || $assignment_domain == "Programming" || $assignment_domain = "Freelancer Programming" || $assignment_domain = "Professional Writing" || $assignment_domain = "Freelancer Professional Writing" || $assignment_domain = "Academic Writing" || $assignment_domain = "Freelancer Academic Writing")
            {
                $get_assignment_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
                $get_assignment_result = mysqli_query($conn, $get_assignment_sql);
                $get_assignment_row = mysqli_fetch_assoc($get_assignment_result);

                $marks_obtained = $get_assignment_row['marks_obtained'];
                $marks_out_of = $get_assignment_row['marks_out_of'];
                $feedback = $get_assignment_row['feedback'];
                $marks_added_on = $get_assignment_row['marks_added_on'];

                if($marks_obtained != null)
                {
                    $total_marks_obtained += $marks_obtained;
                    $total_marks_out_of += $marks_out_of;
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

                // $total_marks_obtained += $marks_obtained;
                // $total_marks_out_of += $marks_out_of;
                // $total_marks_out_of_100 = $total_marks_obtained * 100 / $total_marks_out_of;
                // switch($total_marks_out_of_100)
                // {
                //     case ($total_marks_out_of_100 >= 71):
                //         $total_marks_category = "Distinction";
                //         $total_distinction++;
                //         break;
                //     case ($total_marks_out_of_100 >= 61 && $total_marks_out_of_100 <= 70):
                //         $total_marks_category = "Merit";
                //         $total_merit++;
                //         break;
                //     case ($total_marks_out_of_100 >= 51 && $total_marks_out_of_100 <= 60):
                //         $total_marks_category = "Passing";
                //         $total_passing++;
                //         break;
                //     case ($total_marks_out_of_100 >= 0 && $total_marks_out_of_100 <= 50):
                //         $total_marks_category = "Resit";
                //         $total_resit++;
                //         break;
                // }
            }
        }

        $students_details_array = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'college' => $college,
            'email' => $email,
            'country_name' => $country_name,
            'country_code' => $country_code,
            'number' => $number,
            'is_select' => $is_select,
            'addition_date' => $addition_date,
            'expiry_date' => $expiry_date,
            'utm_data' => $utm_data,
            'total_marks_obtained' => $total_marks_obtained,
            'total_marks_out_of' => $total_marks_out_of,
            'total_marks_out_of_100' => $total_marks_out_of_100,
            'total_marks_category' => $total_marks_category,
            'total_resit' => $total_resit,
            'total_passing' => $total_passing,
            'total_merit' => $total_merit,
            'total_distinction' => $total_distinction,
        );

        array_push($data_array, $students_details_array);
    }

    echo json_encode($data_array);
