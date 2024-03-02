<?php
    header('Content-Type: application/json');
    // header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);
    $freelancer_id = $data['freelancer_id'];
    $number_of_assignments = $data['number_of_assignments'];
    
    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $insert_into_claims_sql = "INSERT INTO `freelancer_reward_claims`(`freelancer_id`, `number_of_assignments`, `claim_datetime`, `claimed`, `sent`, `received`) VALUES ('$freelancer_id', '$number_of_assignments', '$now', '1', '0', '0')";
    $insert_into_claims_result = mysqli_query($conn, $insert_into_claims_sql);

    if($insert_into_claims_result == TRUE)
    {
        $data_array = array(
            "status" => "success",
            "message" => "Claimed Successfully"
        );
    }
    else
    {
        $data_array = array(
            "status" => "error",
            "message" => "Claiming Failed"
        );
    }

    echo json_encode($data_array);

?>