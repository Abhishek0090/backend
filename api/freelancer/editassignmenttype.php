<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';
    
    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_id = $data['freelancer_id'];
    $assignment_type = $data['assignment_type'];
    $assignment_type = str_replace("'", " \' ", $assignment_type);
    $assignment_type = json_encode($assignment_type);

    $get_domain_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $get_domain_result = mysqli_query($conn, $get_domain_sql) or die(mysqli_error($conn));
    $get_domain_row = mysqli_fetch_assoc($get_domain_result);

    $technical = $get_domain_row['technical'];

    if($technical == 1)
    {
        $get_details_sql = "SELECT * FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id'";
        $get_details_result = mysqli_query($conn, $get_details_sql) or die(mysqli_error($conn));
        $get_details_row = mysqli_fetch_assoc($get_details_result);
        $old_assignment_type = $get_details_row['assignment_type'];

        $insert_into_update_table = "INSERT INTO `freelancer_update` (`freelancer_id`, `field`, `value`, `updated_on`) VALUES ('$freelancer_id', 'technical_assignment_type', '$old_assignment_type', '$now')";
        $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

        if($insert_into_update_table_result == true)
        {
            $update_sql = "UPDATE `freelancers_technical` SET `assignment_type` = '$assignment_type' WHERE `freelancer_id` = '$freelancer_id'";
            $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

            if($update_result == true)
            {
                $status = 200;
                $message = "Assignment Type Updated Successfully";
            }
        }
    }

    elseif($get_domain_row['non technical'] == 1)
    {
        $get_details_sql = "SELECT * FROM `freelancers_nontechnical` WHERE `freelancer_id` = '$freelancer_id'";
        $get_details_result = mysqli_query($conn, $get_details_sql) or die(mysqli_error($conn));
        $get_details_row = mysqli_fetch_assoc($get_details_result);
        $old_assignment_type = $get_details_row['assignment_type'];

        $insert_into_update_table = "INSERT INTO `freelancer_update` (`freelancer_id`, `field`, `value`, `updated_on`) VALUES ('$freelancer_id', 'nontechnical_assignment_type', '$old_assignment_type', '$now')";
        $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

        if($insert_into_update_table_result == true)
        {
            $update_sql = "UPDATE `freelancers_nontechnical` SET `assignment_type` = '$assignment_type' WHERE `freelancer_id` = '$freelancer_id'";
            $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));
            
            if($update_result == true)
            {
                $status = 200;
                $message = "Assignment Type Updated Successfully";
            }
        }
    }
    else
    {
        $message = "No Domain Selected";
    }
    
    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        // 'update_sql' => $update_sql,
        // 'data' => $data,
        'technical' => $technical,
        // 'freelancer_map' => $get_domain_row,
        // 'freelancer_technical' => $get_details_row,
    ));

?>