<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // $number = $data['number'];

    $map_array = array();
    $freelancer_map_sql = "SELECT * FROM `freelancers_map` ORDER BY id DESC";    
    $freelancer_map_result = mysqli_query($conn, $freelancer_map_sql);
    // $freelancer_map_data = mysqli_fetch_assoc($freelancer_map_result);
    // $freelancer_map_count = mysqli_num_rows($freelancer_map_result);

    while($freelancer_map_data = mysqli_fetch_assoc($freelancer_map_result))
    {
        // $map_array[] = $freelancer_map_data;
        // $freelancer_map_data['id'] = (int)$freelancer_map_data['id'];
        // $freelancer_map_data['freelancer_id'] = (int)$freelancer_map_data['freelancer_id'];
        // $freelancer_map_data['role'] = (int)$freelancer_map_data['role'];
        $freelancer_id = $freelancer_map_data['id'];
        $role = $freelancer_map_data['role'];

        $freelancer_array = array(
            'id' => $freelancer_id,
            'role' => $role,
        );

        array_push($map_array, $freelancer_array);
    }

    // if($freelancer_map_count > 0)
    // {
    //     do
    //     {
    //         $map_array[] = $freelancer_map_data;
    //     }while($freelancer_map_data = mysqli_fetch_assoc($freelancer_map_result));
    // }
    echo json_encode($map_array);

?>