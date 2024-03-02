<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];

    $get_inquiries_count_sql = "SELECT * FROM `assignment_inquiries` WHERE `freelancer_id` = '$freelancer_id' AND `status` = '1'";
    $get_inquiries_count_result = mysqli_query($conn, $get_inquiries_count_sql);
    $inquiries_count = mysqli_num_rows($get_inquiries_count_result);
    
    $get_all_assignments_data_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `status` = 1";
    $get_all_assignments_result = mysqli_query($conn, $get_all_assignments_data_sql);
    $get_all_assignments_count = mysqli_num_rows($get_all_assignments_result);

    $incomplete = 0;
    $completed = 0;
    while($get_all_assignments_data_row = mysqli_fetch_array($get_all_assignments_result))
    {
        $assignment_id = $get_all_assignments_data_row['assignment_id'];
        $get_assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = $assignment_id";
        $get_assignment_data_result = mysqli_query($conn, $get_assignment_data_sql);
        while($get_assignment_data_row = mysqli_fetch_array($get_assignment_data_result))
        {
            if($get_assignment_data_row['completed'] == 0)
            {
                $incomplete++;
            }
            else if($get_assignment_data_row['completed'] == 1)
            {
                $completed++;
            }
        }
    }

    echo json_encode(array(
        'total_inquiries' => $inquiries_count,
        'assigned_to_me' => $get_all_assignments_count,
        'completed' => $completed,
        'incomplete' => $incomplete,
    ));

?>