<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $map_array = array();
    $assignment_map_sql = "SELECT * FROM `brainheaters` ORDER BY id DESC";    
    $assignment_map_result = mysqli_query($conn, $assignment_map_sql);
    
    while($assignment_map_data = mysqli_fetch_array($assignment_map_result))
    {
        $assignment_id = $assignment_map_data['id'];
        $name = $assignment_map_data['name'];
        $number = $assignment_map_data['number'];
        $college_name = $assignment_map_data['college_name'];
        $title = $assignment_map_data['title'];
        $budget = $assignment_map_data['budget'];
        $date_of_submission = $assignment_map_data['date_of_submission'];
        $deadline = $assignment_map_data['deadline'];
        
        $bh_posted = $assignment_map_data['bh_posted'];
        $bh_likely = $assignment_map_data['bh_likely'];
        $bh_converted = $assignment_map_data['bh_converted'];
        $bh_completed = $assignment_map_data['bh_completed'];
        $bh_lost = $assignment_map_data['bh_lost'];
        $lost_reason = $assignment_map_data['lost_reason'];
        
        $status = "";
        if($bh_lost == 1)
        {
            $status = "Lost";
        }
        else if($bh_completed == 1)
        {
            $status = "Completed";
        }
        else if($bh_converted == 1)
        {
            $status = "Converted";
        }
        else if($bh_likely == 1)
        {
            $status = "Likely";
        }
        else if($bh_posted == 1)
        {
            $status = "Posted";
        }
        
        $assignment_array = array(
            'id' => $assignment_id,
            'name' => $name,
            'number' => $number,
            'college_name' => $college_name,
            'title' => $title,
            'budget' => $budget,
            'date_of_submission' => $date_of_submission,
            'deadline' => $deadline,
            'status' => $status,
            'lost_reason' => $lost_reason
        );
        array_push($map_array, $assignment_array);
    }

    echo json_encode($map_array);    
?>