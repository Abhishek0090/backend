<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['id'];

    $data_array = array();

    $get_all_freelancer_bids = "SELECT * FROM `all_bids` WHERE `freelancer_id` = $freelancer_id ORDER BY `id` DESC";
    $get_all_freelancer_bids_query = mysqli_query($conn, $get_all_freelancer_bids);
    while($get_all_freelancer_bids_row = mysqli_fetch_array($get_all_freelancer_bids_query))
    {
        $id = $get_all_freelancer_bids_row['requirements_id'];
        $amount = $get_all_freelancer_bids_row['amount'];
        
        $get_requirements_map = "SELECT * FROM `requirements_map` WHERE `id` = $id";
        $get_requirements_map_query = mysqli_query($conn, $get_requirements_map);
        $get_requirements_map_row = mysqli_fetch_array($get_requirements_map_query);

        $category = $get_requirements_map_row['category'];

        if($category == "art and craft")
        {
            $get_assignment_data = "SELECT * FROM `art_and_craft` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
                "amount" => $amount,
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }

        if($category == "ppt making")
        {
            $get_assignment_data = "SELECT * FROM `ppt_making` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
                "amount" => $amount,
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }
    }

    echo json_encode($data_array);


?>