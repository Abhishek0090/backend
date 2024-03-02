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
    $subject_tags = $data['subject_tags'];
    $subject_tags = str_replace("'", " \' ", $subject_tags);
    $subject_tags = json_encode($subject_tags);

    $get_domain_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $get_domain_result = mysqli_query($conn, $get_domain_sql) or die(mysqli_error($conn));
    $get_domain_row = mysqli_fetch_assoc($get_domain_result);

    if($get_domain_row['technical'] == 1)
    {
        $get_details_sql = "SELECT * FROM `freelancers_technical` WHERE `freelancer_id` = '$freelancer_id'";
        $get_details_result = mysqli_query($conn, $get_details_sql) or die(mysqli_error($conn));
        $get_details_row = mysqli_fetch_assoc($get_details_result);
        $old_subject_tags = $get_details_row['subject_tags'];

        $insert_into_update_table = "INSERT INTO `freelancer_update` (`freelancer_id`, `field`, `value`, `updated_on`) VALUES ('$freelancer_id', 'technical_subject_tags', '$old_subject_tags', '$now')";
        $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

        if($insert_into_update_table_result == true)
        {
            $update_sql = "UPDATE `freelancers_technical` SET `subject_tags` = '$subject_tags' WHERE `freelancer_id` = '$freelancer_id'";
            $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));

            if($update_result == true)
            {
                $status = 200;
                $message = "Subject Tags Updated Successfully";
            }
        }
        
        
    }
    if($get_domain_row['non technical'] == 1)
    {
        $get_details_sql = "SELECT * FROM `freelancers_nontechnical` WHERE `freelancer_id` = '$freelancer_id'";
        $get_details_result = mysqli_query($conn, $get_details_sql) or die(mysqli_error($conn));
        $get_details_row = mysqli_fetch_assoc($get_details_result);
        $old_subject_tags = $get_details_row['subject_tags'];

        $insert_into_update_table = "INSERT INTO `freelancer_update` (`freelancer_id`, `field`, `value`, `updated_on`) VALUES ('$freelancer_id', 'nontechnical_subject_tags', '$old_subject_tags', '$now')";
        $insert_into_update_table_result = mysqli_query($conn, $insert_into_update_table) or die(mysqli_error($conn));

        if($insert_into_update_table_result == true)
        {
            $update_sql = "UPDATE `freelancers_nontechnical` SET `subject_tags` = '$subject_tags' WHERE `freelancer_id` = '$freelancer_id'";
            $update_result = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));
            
            if($update_result == true)
            {
                $status = 200;
                $message = "Subject Tags Updated Successfully";
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
        // 'data' => $data,
        // 'freelancer_map' => $get_domain_row,
        // 'freelancer_technical' => $get_details_row,
    ));

?>