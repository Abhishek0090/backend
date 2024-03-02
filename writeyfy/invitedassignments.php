<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $user_id = $_GET['user_id'];

    $data_array = array();

    $get_freelancer_data_sql = "SELECT * FROM `freelancers_map` WHERE `user_id` = '$user_id'";
    $get_freelancer_data_result = mysqli_query($conn, $get_freelancer_data_sql);
    $get_freelancer_data_row = mysqli_fetch_assoc($get_freelancer_data_result);

    $freelancer_id = $get_freelancer_data_row['id'];

    $get_all_invited_assignments_sql = "SELECT * FROM `requirements_invites` WHERE `freelancer_id` = '$freelancer_id'";
    $get_all_invited_assignments_result = mysqli_query($conn, $get_all_invited_assignments_sql);
    while($get_all_invited_assignments_row = mysqli_fetch_array($get_all_invited_assignments_result))
    {
        $requirements_id = $get_all_invited_assignments_row['requirements_id'];

        $get_requirements_data_sql = "SELECT * FROM `requirements_map` WHERE `id` = '$requirements_id'";
        $get_requirements_data_result = mysqli_query($conn, $get_requirements_data_sql);
        $get_requirements_data_row = mysqli_fetch_assoc($get_requirements_data_result);
        
        if($category == "art and craft")
        {
            $get_assignment_data = "SELECT * FROM `art_and_craft` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
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
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }

        if($category == "technical drawing")
        {
            $get_assignment_data = "SELECT * FROM `technical_drawing` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }

        if($category == "hand written")
        {
            $get_assignment_data = "SELECT * FROM `copy_paste` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }

        if($category == "other requirement")
        {
            $get_assignment_data = "SELECT * FROM `other_requirements` WHERE `requirements_id` = $id";
            $get_assignment_data_query = mysqli_query($conn, $get_assignment_data);
            $get_assignment_data_row = mysqli_fetch_array($get_assignment_data_query);

            $data = array(
                "id" => $id,
                "category" => $category,
                "details" => $get_assignment_data_row,
            );

            array_push($data_array, $data);
        }
    }

    echo json_encode($data_array);
?>