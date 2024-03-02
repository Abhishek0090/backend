<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];

    $total_marks_obtained = 0;
    $total_marks_out_of = 0;
    $total_resit = 0;
    $total_passing = 0;
    $total_merit = 0;
    $total_distinction = 0;

    $data_array = array();

    $assign_to_freelancer_sql = " SELECT `assignment_id` FROM `assign_to_freelancer` WHERE `freelancer_id` = '$freelancer_id' AND `status` = '1' ORDER BY `id` DESC"; 
    $assign_to_freelancer_result = mysqli_query($conn, $assign_to_freelancer_sql); 
    while($assign_to_freelance_data = mysqli_fetch_assoc($assign_to_freelancer_result))
    {
    
        $assignment_id = $assign_to_freelance_data['assignment_id']; 

        $assignment_freelance_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC";
        $assignment_freelance_result = mysqli_query($conn, $assignment_freelance_sql); 
        while($assign_to_freelance_data_final = mysqli_fetch_assoc($assignment_freelance_result))
        {
            $id = $assign_to_freelance_data_final['id'];
            $title = $assign_to_freelance_data_final['title'];
            $deadline = $assign_to_freelance_data_final['deadline']; 
            $resit = $assign_to_freelance_data_final['resit'];
            $completed = $assign_to_freelance_data_final['completed'];
            $marks_obtained = $assign_to_freelance_data_final['marks_obtained'];
            $marks_out_of = $assign_to_freelance_data_final['marks_out_of'];
            $feedback = $assign_to_freelance_data_final['feedback'];
            $marks_added_on = $assign_to_freelance_data_final['marks_added_on'];

            if($reit == '1')
            {
                $status = "Resit";
            }
            else if($completed == '1')
            {
                $status = "Completed";
            } 
            else if($completed == '0')
            {
                $status = "InComplete";
            }
            else if($completed == '-1')
            {
                $status = "Lost";
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
            }

            $assign_to_freelance_array = array(
                'id' => $id,
                'title' => $title,
                'deadline' => $deadline, 
                'status' => $status,
                'marks_obtained' => $marks_obtained,
                'marks_out_of' => $marks_out_of,
                'feedback' => $feedback,
                'marks_added_on' => $marks_added_on,
                'marks_category' => $marks_category
            );

            array_push($data_array, $assign_to_freelance_array);
        }
    } 

    $marks_array = array(
        'total_marks_obtained' => $total_marks_obtained,
        'total_marks_out_of' => $total_marks_out_of,
        'total_marks_category' => $total_marks_category,
    );
    array_push($data_array, $marks_array);

    echo json_encode($data_array);

?>