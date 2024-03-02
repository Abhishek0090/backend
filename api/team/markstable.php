<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $table_array = array();

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;

    $get_all_assignments_data_sql = "SELECT * FROM `assignment_map` WHERE `domain` = 'Freelancer Academic Writing' OR `domain` = 'Freelancer Programming'  OR `domain` = 'Freelancer Professional Writing'  OR `domain` = 'Freelancer' ORDER BY `id` DESC";
    $get_all_assignments_data_result = mysqli_query($conn, $get_all_assignments_data_sql);
    while($get_all_assignments_data_row = mysqli_fetch_array($get_all_assignments_data_result))
    {
        $assignment_id = $get_all_assignments_data_row['id'];
        $get_assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
        $get_assignment_details_result = mysqli_query($conn, $get_assignment_details_sql);
        $get_assignment_details_row = mysqli_fetch_assoc($get_assignment_details_result);
        
        $marks_obtained = $get_assignment_details_row['marks_obtained'];
        $marks_out_of = $get_assignment_details_row['marks_out_of'];
        $feedback = $get_assignment_details_row['feedback'];
        $marks_added_on = $get_assignment_details_row['marks_added_on'];
        $marks_added_by = $get_assignment_details_row['marks_added_by'];


        if($marks_obtained != NULL || $marks_out_of != NULL || $feedback != NULL || $marks_added_on != NULL || $marks_added_by != NULL)
        {
            $assignment_title = $get_assignment_details_row['title'];
            
            $user_id = $get_all_assignments_data_row['user_id'];
            $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
            $get_user_details_result = mysqli_query($conn, $get_user_details_sql);
            $get_user_details_row = mysqli_fetch_assoc($get_user_details_result);
            $user_firstname = $get_user_details_row['firstname'];
            $user_lastname = $get_user_details_row['lastname'];
            $user_name = $user_firstname . " " . $user_lastname;

            $freelancers = array();
            $get_freelancer_id_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = '$assignment_id' AND `status` = 1 ORDER BY `id` DESC";
            $get_freelancer_id_result = mysqli_query($conn, $get_freelancer_id_sql);
            while($get_freelancer_id_row = mysqli_fetch_array($get_freelancer_id_result))
            {
                $freelancer_id = $get_freelancer_id_row['freelancer_id'];
                
                $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
                $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
                $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details_result);
                $freelancer_firstname = $get_freelancer_details_row['firstname'];
                $freelancer_lastname = $get_freelancer_details_row['lastname'];
                $freelancer_name = $freelancer_firstname . " " . $freelancer_lastname;
                
                $freelancer_details = array(
                    "freelancer_id" => $freelancer_id,
                    "freelancer_name" => $freelancer_name,
                );

                array_push($freelancers, $freelancer_details);
            }

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
            // check marks category
            if($marks_out_of == null)
            {
                $marks_category = "Marks not Received";
            }
            else
            {
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

            $marks_data = array(
                "assignment_id" => $assignment_id,
                "assignment_title" => $assignment_title,
                "marks_obtained" => $marks_obtained,
                "marks_out_of" => $marks_out_of,
                "marks_category" => $marks_category, // "Distinction", "Merit", "Passing", "Resit
                "feedback" => $feedback,
                "marks_added_on" => $marks_added_on,
                "marks_added_by" => $marks_added_by,
                "user_id" => $user_id,
                "user_name" => $user_name,
                "freelancers" => $freelancers,
            );

            array_push($table_array, $marks_data);
        }
        else
        {
            continue;
        }
    }

    echo json_encode(array(
        "table" => $table_array,
        "total_marks_obtained" => $total_marks_obtained,
        "total_marks_out_of" => $total_marks_out_of,
        "total_marks_category" => $total_marks_category,
        "total_marks_out_of_100" => $total_marks_out_of_100,
        "total_resit" => $total_resit,
        "total_passing" => $total_passing,
        "total_merit" => $total_merit,
        "total_distinction" => $total_distinction,
    ));
?>