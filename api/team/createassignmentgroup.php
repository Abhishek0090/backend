<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $created_by_id = $data['created_by_id']; // 3
    $assignment_id = $data['assignment_id']; // 86

    if($created_by_id == NULL || $assignment_id == NULL || $created_by_id == "" || $assignment_id == "")
    {
        echo json_encode(array(
            "status" => 500,
            "message" => "Please provide all details",
        ));
        return;
    }

    $get_creator_details_sql = "SELECT * FROM `team` WHERE `id` = '$created_by_id'";
    $get_creator_details = mysqli_query($conn, $get_creator_details_sql);
    $get_creator_details_row = mysqli_fetch_assoc($get_creator_details);
    $creator_name = $get_creator_details_row['name'];
    $creator_role = $get_creator_details_row['role'];

    $get_pm_id_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = '$assignment_id' ORDER BY `id` DESC LIMIT 1";
    $get_pm_id = mysqli_query($conn, $get_pm_id_sql);
    $get_pm_id_row = mysqli_fetch_assoc($get_pm_id);
    $pm_id = $get_pm_id_row['project_manager'];

    $get_pm_details_sql = "SELECT * FROM `team` WHERE `id` = '$pm_id'";
    $get_pm_details = mysqli_query($conn, $get_pm_details_sql);
    $get_pm_details_row = mysqli_fetch_assoc($get_pm_details);
    $pm_name = $get_pm_details_row['name'];
    $pm_role = $get_pm_details_row['role'];

    $team_array = array();

    $pm_array = array(
        "id" => $pm_id,
        "name" => $pm_name,
        "role" => $pm_role,
    );

    array_push($team_array, $pm_array);

    $admin_array = array();

    $get_all_admin_details_sql = "SELECT * FROM `team` WHERE `role` = 'Admin' OR `role` = 'admin'";
    $get_all_admin_details = mysqli_query($conn, $get_all_admin_details_sql);
    
    while ($get_all_admin_details_row = mysqli_fetch_assoc($get_all_admin_details))
    {
        $admin_id = $get_all_admin_details_row['id'];
        $admin_name = $get_all_admin_details_row['name'];
        $admin_role = $get_all_admin_details_row['role'];

        $admin_array = array(
            "id" => $admin_id,
            "name" => $admin_name,
            "role" => $admin_role,
        );

        array_push($team_array, $admin_array);
    }

    $freelancers_array = array();

    $get_all_freelancers_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = '$assignment_id'";
    $get_all_freelancers = mysqli_query($conn, $get_all_freelancers_sql);
    
    while ($get_all_freelancers_row = mysqli_fetch_assoc($get_all_freelancers))
    {
        $freelancer_id = $get_all_freelancers_row['freelancer_id'];

        $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
        $get_freelancer_details = mysqli_query($conn, $get_freelancer_details_sql);
        $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details);
        $freelancer_firstname = $get_freelancer_details_row['firstname'];
        $freelancer_lastname = $get_freelancer_details_row['lastname'];
        $freelancer_name = $freelancer_firstname . " " . $freelancer_lastname;
        $freelancer_role = $get_freelancer_details_row['role'];
        $freelancer_role = "Freelancer";

        $freelancer_array = array(
            "id" => $freelancer_id,
            "name" => $freelancer_name,
            "role" => $freelancer_role,
        );

        array_push($freelancers_array, $freelancer_array);
    }
    
    $get_student_id = "SELECT * FROM `assignment_map` WHERE `id` = '$assignment_id'";
    $get_student_id = mysqli_query($conn, $get_student_id);
    $get_student_id_row = mysqli_fetch_assoc($get_student_id);
    $student_id = $get_student_id_row['user_id'];

    $get_user_details_sql = "SELECT * FROM `users` WHERE `id` = '$student_id'";
    $get_user_details = mysqli_query($conn, $get_user_details_sql);
    $get_user_details_row = mysqli_fetch_assoc($get_user_details);
    $user_firstname = $get_user_details_row['firstname'];
    $user_lastname = $get_user_details_row['lastname'];
    $user_fullname = $user_firstname . " " . $user_lastname;
    
    $user_array = array(
        "id" => $student_id,
        "name" => $user_fullname,
        "role" => "Student",
    );
    
    $array = array(
        "created_by_id" => $created_by_id,
        "creator_name" => $creator_name,
        "team" => $team_array,
        "freelancers" => $freelancers_array,
        "user" => $user_array,
    );

    $members = json_encode($array);
    // echo $members;

    $insert_into_all_chats_sql = "INSERT INTO `all_chats` 
    (`chat_type`, `created_on`, `created_by_type`, `created_by_id`, `members`, `assignment_id`, `is_enabled`) 
    VALUES  ('Assignment Group', '$now', '$creator_role', '$created_by_id', '$members', '$assignment_id', 1)";
    $insert_into_all_chats = mysqli_query($conn, $insert_into_all_chats_sql);

    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `created_by_id` = '$created_by_id' AND `members` = '$members' ORDER BY `id` DESC LIMIT 1";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    $get_all_chats_row = mysqli_fetch_assoc($get_all_chats);
    $all_chats_id = $get_all_chats_row['id'];

    echo json_encode(array(
        "status" => 200,
        "message" => "Assignment Chat Created",
        "chat_id" => $all_chats_id,
        "members" => json_decode($members),
        // "insert chats sql" => $insert_into_all_chats_sql,
    ));
?>