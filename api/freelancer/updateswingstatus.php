<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];
    // $category = $data['category'];

    $id = $_GET['id'];
    $status = $_GET['status'];

    // 0 - not set
    // 1 - partially available
    // 2 - fully available
    // -1 - not available

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    if($status == 'partially_available')
    {
        // set to 1
        $insert_swing_status = "INSERT INTO `freelancer_swing` (`freelancer_id`, `swing_status`, `updated_on`) VALUES ('$id', 1, '$now')";
        $insert_swing_status_result = mysqli_query($conn, $insert_swing_status);
    }
    else if($status == 'fully_available')
    {
        // set to 2
        $insert_swing_status = "INSERT INTO `freelancer_swing` (`freelancer_id`, `swing_status`, `updated_on`) VALUES ('$id', 2, '$now')";
        $insert_swing_status_result = mysqli_query($conn, $insert_swing_status);
    }
    else if($status == 'not_available')
    {
        // set to -1
        $insert_swing_status = "INSERT INTO `freelancer_swing` (`freelancer_id`, `swing_status`, `updated_on`) VALUES ('$id', -1, '$now')";
        $insert_swing_status_result = mysqli_query($conn, $insert_swing_status);
    }

    if($insert_swing_status_result)
    {
        echo json_encode(array(
                'message' => 'Swing status updated successfully'
            ));
    }
    else
    {
        echo json_encode(array(
            'message' => 'Swing status update failed',
            'sql' => $insert_swing_status,
        ));
    }
    
?>