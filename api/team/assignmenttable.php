<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];

    $map_array = array();
    $assignment_map_sql = "SELECT * FROM `assignment_map` ORDER BY id DESC";    
    $assignment_map_result = mysqli_query($conn, $assignment_map_sql);
    $assignment_map_data = mysqli_fetch_assoc($assignment_map_result);
    $assignment_map_count = mysqli_num_rows($assignment_map_result);

    while($assignment_map_data = mysqli_fetch_array($assignment_map_result))
    {
        // $map_array[] = $assignment_map_data;
        // $assignment_map_data['id'] = (int)$assignment_map_data['id'];
        // $assignment_map_data['freelancer_id'] = (int)$assignment_map_data['freelancer_id'];
        // $assignment_map_data['role'] = (int)$assignment_map_data['role'];
        $assignment_id = $assignment_map_data['id'];

        $get_assignment_details_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id'";
        $get_assignment_details_result = mysqli_query($conn, $get_assignment_details_sql);
        $get_assignment_details_data = mysqli_fetch_assoc($get_assignment_details_result);

        $assignment_array = array(
            'id' => $assignment_id,
            // 'map_sql' => $assignment_map_sql,
            // 'sql' => $get_assignment_details_sql,
            // "name" => "Bhavya Haria",
            // "budget" => 2500,
            'title' => $get_assignment_details_data['title'],
            'description' => $get_assignment_details_data['description'],
            'deadline' => $get_assignment_details_data['deadline'],
            // 'posted' => $get_assignment_details_data['posted'],
            // 'under_process' => $get_assignment_details_data['under_process'],
            // 'assigned_to_pm' => $get_assignment_details_data['assigned_to_pm'],
            // 'assigned_to_freelancer' => $get_assignment_details_data['assigned_to_freelancer'],
            // 'completed' => $get_assignment_details_data['completed'],
            // 'review_received' => $get_assignment_details_data['review_received'],
            // 'lost' => $get_assignment_details_data['lost'],
            // 'progress' => "Under Process",
            // 'status' => "Active",
        );

        array_push($map_array, $assignment_array);
    }

    echo json_encode($map_array);    
?>