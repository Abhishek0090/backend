<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data_array = array();
    
    $freelancer_eligible_sql = "SELECT freelancer_eligible_old.`id`,freelancer_eligible_old.`freelancer_id` ,freelancer_eligible_old.`number_of_assignments` , freelancer_eligible_old.`made_on`,freelancers_map.`firstname` , freelancers_map.`lastname`, CASE WHEN freelancer_eligible_old.`status`= 1 THEN 'Make Eligible'  WHEN freelancer_eligible_old.`status` = 2 THEN 'Eligible' END AS status FROM `freelancer_eligible_old` JOIN `freelancers_map`ON `freelancers_map`.id = `freelancer_eligible_old`.freelancer_id   ORDER BY freelancer_eligible_old.`id` DESC"; 
    
    $freelancer_eligible_result = mysqli_query($conn, $freelancer_eligible_sql); 

    while($freelancer_eligible_data = mysqli_fetch_assoc($freelancer_eligible_result))
    {
    
        $id = $freelancer_eligible_data['id'];
        $freelancer_id = $freelancer_eligible_data['freelancer_id'];
        $first_name = $freelancer_eligible_data['firstname'];
        $last_name = $freelancer_eligible_data['lastname'];
        $number_of_assignments = $freelancer_eligible_data['number_of_assignments'];
        $made_on = $freelancer_eligible_data['made_on'];
        $status = $freelancer_eligible_data['status']; 

        $freelancer_eligible_array = array(
            'eligible_id' => $id,
            'freelancer_id' => $freelancer_id,
            'freelancer_name' => $first_name." ".$last_name  ,
            'number_of_assignments' => $number_of_assignments, 
            'made_on' => $made_on,
            'status' => $status
        );

        array_push($data_array, $freelancer_eligible_array);
    }

 
    echo json_encode($data_array);

?>