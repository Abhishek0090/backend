<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $logged_in_user_id = $data['user_id'];

    $my_chats = array();

    $team_and_student_personal_chats = array();
    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and User Personal' ORDER BY `id` DESC";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    while($get_all_chats_row = mysqli_fetch_array($get_all_chats))
    {
        $chat_id = $get_all_chats_row['id'];
        $members_present = $get_all_chats_row['members'];
        $members = json_decode($members_present, true);
        $created_by_id = $get_all_chats_row['created_by'];
        $user_id = $members['user_id'];

        if($logged_in_user_id == $created_by_id || $logged_in_user_id == $user_id)
        {
            $created_on = $get_all_chats_row['created_on'];
            $created_by_id = $get_all_chats_row['created_by_id'];

            $chat_details = array(
                "chat_id" => $chat_id,
                "members" => $members,
                "created_on" => $created_on,
                "created_by_id" => $created_by_id,
            );
            array_push($team_and_student_personal_chats, $chat_details);
        }
    }

    $user_assignment_chats = array();
    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Team and Student Assignment' ORDER BY `id` DESC";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    while($get_all_chats_row = mysqli_fetch_array($get_all_chats))
    {
        $chat_id = $get_all_chats_row['id'];
        $members_present = $get_all_chats_row['members'];
        $members = json_decode($members_present, true);
        $created_by_id = $get_all_chats_row['created_by'];
        $member_id = $members['member_id'];
        $assignment_id = $get_all_chats_row['assignment_id'];

        if($team_id == $created_by_id || $team_id == $member_id)
        {
            $created_on = $get_all_chats_row['created_on'];
            $created_by_id = $get_all_chats_row['created_by_id'];

            $chat_details = array(
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "members" => $members,
                "created_on" => $created_on,
                "created_by_id" => $created_by_id,
            );
            array_push($user_assignment_chats, $chat_details);
        }
    }
    
    $group_assignment_chats = array();
    $get_all_chats_sql = "SELECT * FROM `all_chats` WHERE `chat_type` = 'Assignment Group' ORDER BY `id` DESC";
    $get_all_chats = mysqli_query($conn, $get_all_chats_sql);
    while($get_all_chats_row = mysqli_fetch_array($get_all_chats))
    {
        $chat_id = $get_all_chats_row['id'];
        $members_present = $get_all_chats_row['members'];
        $members = json_decode($members_present, true);
        $created_by_id = $get_all_chats_row['created_by'];
        $member_id = $members['member_id'];
        $assignment_id = $get_all_chats_row['assignment_id'];

        if($team_id == $created_by_id || $team_id == $member_id)
        {
            $created_on = $get_all_chats_row['created_on'];
            $created_by_id = $get_all_chats_row['created_by_id'];

            $chat_details = array(
                "chat_id" => $chat_id,
                "assignment_id" => $assignment_id,
                "members" => $members,
                "created_on" => $created_on,
                "created_by_id" => $created_by_id,
            );
            array_push($group_assignment_chats, $chat_details);
        }
    }


    echo json_encode(array(
        array(
            "Name" => "Team and Student Personal Chats",
            "Chats" => $team_and_student_personal_chats
        ),
        array(
            "Name" => "User Assignment Chats",
            "Chats" => $user_assignment_chats
        ),
        array(
            "Name" => "Group Assignment Chats",
            "Chats" => $group_assignment_chats
        ),
    ));
?>