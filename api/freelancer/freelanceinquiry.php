<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];

    $data_array = array();
    
    $freelancer_inquiry_sql = " SELECT `assignment_id` FROM `assignment_inquiries` WHERE `freelancer_id` = '$freelancer_id' AND `status` = '1' ORDER BY `id` DESC"; 

    $freelancer_inquiry_result = mysqli_query($conn, $freelancer_inquiry_sql); 

    while($freelancer_inquiry_data = mysqli_fetch_assoc($freelancer_inquiry_result))
    {
    
        $assignment_id = $freelancer_inquiry_data['assignment_id']; 

            $assignment_freelance_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC";

            $assignment_freelance_result = mysqli_query($conn, $assignment_freelance_sql); 

            while($assignment_freelance_data = mysqli_fetch_assoc($assignment_freelance_result))
            {

                $id = $assignment_freelance_data['id'];
                $title = $assignment_freelance_data['title'];
                $deadline = $assignment_freelance_data['deadline'];
                $marks_obtained = $assignment_freelance_data['marks_obtained'];
                $marks_out_of = $assignment_freelance_data['marks_out_of'];
                $feedback = $assignment_freelance_data['feedback'];
                $marks_added_on = $assignment_freelance_data['marks_added_on'];

                if($marks_out_of != 100)
                {
                    // convert to 100
                    $out_of_100 = $marks_obtained * 100 / $marks_out_of;
                    
                    switch($out_of_100)
                    {
                        case ($out_of_100 >= 71):
                            $marks_category = "Distinction";
                            break;
                        case ($out_of_100 >= 61 && $out_of_100 <= 70):
                            $marks_category = "Merit";
                            break;
                        case ($out_of_100 >= 51 && $out_of_100 <= 60):
                            $marks_category = "Passing";
                            break;
                        case ($out_of_100 >= 0 && $out_of_100 <= 50):
                            $marks_category = "Resit";
                            break;
                    }
                }
                if($marks_out_of == 100)
                {
                    switch($marks_obtained)
                    {
                        case ($marks_obtained >= 71):
                            $marks_category = "Distinction";
                            break;
                        case ($marks_obtained >= 61 && $marks_obtained <= 70):
                            $marks_category = "Merit";
                            break;
                        case ($marks_obtained >= 51 && $marks_obtained <= 60):
                            $marks_category = "Passing";
                            break;
                        case ($marks_obtained >= 0 && $marks_obtained <= 50):
                            $marks_category = "Resit";
                            break;
                    }
                }
                
                $freelancer_inquiry_array = array(
                    'id' => $id,
                    'title' => $title,
                    'deadline' => $deadline, 
                    'marks_obtained' => $marks_obtained,
                    'marks_out_of' => $marks_out_of,
                    'feedback' => $feedback,
                    'marks_added_on' => $marks_added_on,
                    'marks_category' => $marks_category
                );

                array_push($data_array, $freelancer_inquiry_array);
            }

    }

    echo json_encode($data_array);

?>