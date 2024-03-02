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

    $assign_to_pm_table = "SELECT `id`, `name`, `email_old`, `number`, `number_whatsapp`, CASE WHEN `is_active`= 1 THEN 'Active' ELSE 'InActive' END AS status FROM `team` WHERE `role` = 'pm' ORDER BY `id` DESC"; 

    $assign_to_pm_table_result = mysqli_query($conn, $assign_to_pm_table); 

    while($assign_to_pm_tabledata = mysqli_fetch_assoc($assign_to_pm_table_result))
    {
    
        $id = $assign_to_pm_tabledata['id'];
        $name = $assign_to_pm_tabledata['name'];
        $email_old = $assign_to_pm_tabledata['email_old'];
        $number = $assign_to_pm_tabledata['number'];
        $number_whatsapp = $assign_to_pm_tabledata['number_whatsapp'];
        $status = $assign_to_pm_tabledata['status'];

        
        $pm_marks_obtained = 0;
        $pm_marks_out_of = 0;
        $pm_marks_out_of_100 = 0;
        $pm_marks_category = "";
        $pm_resit = 0;
        $pm_passing = 0;
        $pm_merit = 0;
        $pm_distinction = 0;

        $assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `project_manager` = '$id' ORDER BY `id` DESC  ";
        $pm_details_tbl_result = mysqli_query($conn, $assignment_details_sql); 
        
        while($pm_details_data = mysqli_fetch_assoc($pm_details_tbl_result))
        {
            $marks_obtained = $pm_details_data['marks_obtained'];
            $marks_out_of = $pm_details_data['marks_out_of'];
            $feedback = $pm_details_data['feedback'];
            $marks_added_on = $pm_details_data['marks_added_on'];

            if($marks_obtained != null)
            {
                $pm_marks_obtained += $marks_obtained;
                $pm_marks_out_of += $marks_out_of;
                $pm_marks_out_of_100 = $pm_marks_obtained * 100 / $pm_marks_out_of;
                switch($pm_marks_out_of_100)
                {
                    case ($pm_marks_out_of_100 >= 71):
                        $pm_marks_category = "Distinction";
                        $pm_distinction++;
                        break;
                    case ($pm_marks_out_of_100 >= 61 && $pm_marks_out_of_100 <= 70):
                        $pm_marks_category = "Merit";
                        $pm_merit++;
                        break;
                    case ($pm_marks_out_of_100 >= 51 && $pm_marks_out_of_100 <= 60):
                        $pm_marks_category = "Passing";
                        $pm_passing++;
                        break;
                    case ($pm_marks_out_of_100 >= 0 && $pm_marks_out_of_100 <= 50):
                        $pm_marks_category = "Resit";
                        $pm_resit++;
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

        $assign_to_pm_array = array(
            'array_type' => 'PM Array',
            'id' => $id,
            'name' => $name,
            'email_old' => $email_old,
            'number' => $number,
            'number_whatsapp' => $number_whatsapp,
            'status' => $status,
            'total_marks_obtained' => $pm_marks_obtained,
            'total_marks_out_of' => $pm_marks_out_of,
            'total_marks_category' => $pm_marks_category,
            'total_resit' => $pm_resit,
            'total_passing' => $pm_passing,
            'total_merit' => $pm_merit,
            'total_distinction' => $pm_distinction,
        );

        array_push($data_array, $assign_to_pm_array);
    }

    $total_marks_array = array(
        'array_type' => 'Total Marks Array',
        'total_marks_obtained' => $total_marks_obtained,
        'total_marks_out_of' => $total_marks_out_of,
        'total_marks_category' => $total_marks_category,
        'total_resit' => $total_resit,
        'total_passing' => $total_passing,
        'total_merit' => $total_merit,
        'total_distinction' => $total_distinction,
    );
    array_push($data_array, $total_marks_array);

    echo json_encode($data_array);

?>