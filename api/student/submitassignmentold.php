<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    // $data = json_decode(file_get_contents("php://input"), true);

    // $user_id = $data['user_id'];
    // $domain = $data['domain'];

    if (isset($_POST['submit']))
    {
        $data = file_get_contents("php://input");

        // $user_id = $data['user_id'];
        // $domain = $data['domain'];
        // $data = mysqli_real_escape_string($conn, $data);
        // var_dump($user_id);
        // var_dump($domain);
        // var_dump($_POST);
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $domain = mysqli_real_escape_string($conn, $_POST['domain']);
        $files = mysqli_real_escape_string($conn, $_POST['files']);
        // var_dump($user_id);
        // var_dump($domain);
    }

    // var_dump($data);
    // var_dump($user_id);
    // var_dump($domain);

    // enter above details in `assignment` table
    // fetch the id of the assignment
    // enter respective if condition
    // get other details of assignment
    // if freelance assignment then enter details in `assignmentfreelance` table
    // if copy paste assignment then enter details in `assignmentcopypaste` table
    // return single array with all details

    if( $domain == "Freelance")
    {

        // $insert_into_map = "INSERT INTO `assignment_map` (`user_id`, `domain`) VALUES ('$user_id', '$domain')";
        // $insert_into_map_result = mysqli_query($conn, $insert_into_map);

        // $get_assignment_id = "SELECT `id` FROM `assignment_map` WHERE `user_id` = '$user_id' AND `domain` = '$domain' ORDER BY `id` DESC LIMIT 1";
        // $get_assignment_id_result = mysqli_query($conn, $get_assignment_id);
        // $get_assignment_id_row = mysqli_fetch_assoc($get_assignment_id_result);
        // $assignment_id = $get_assignment_id_row['id'];

        // $stream = $data['stream'];
        // $title = $data['title'];
        // $description = $data['description'];
        // $course = $data['course'];
        // $level = $data['level'];
        // $type = $data['type'];
        // $subject_tags = $data['subject_tags'];
        // $deadline = $data['deadline'];
        // $budget = $data['budget'];
        // $file = $data['file'];

        // $now = date("d-m-Y", strtotime("now"));

        // $insert_assignment_sql = "INSERT INTO `assignment_freelance` (`assignment_id`, `stream`, `title`, `description`, `course`, `level`, `type`, `subject_tags`, `deadline`, `budget`, `files`, `submission_date`) VALUES ('$assignment_id', '$stream', '$title', '$description', '$course', '$level', '$type', '$subject_tags', '$deadline', '$budget', '$file', '$now')";
        // $insert_assignment_result = mysqli_query($conn, $insert_assignment_sql);

        // $dummy_array = array(
        //     'id' => 1,
        //     'user_id' => $user_id,
        //     'domain' => $domain,
        //     'stream' => $stream,
        //     'title' => $title,
        //     'description' => $description,
        //     'course' => $course,
        //     'level' => $level,
        //     'type' => $type,
        //     'subject_tags' => $subject_tags,
        //     'deadline' => $deadline,
        //     'budget' => $budget,
        //     'file' => $file
        // );

        // echo json_encode($dummy_array);
    }
    else if( $domain == "Assignment")
    {
        $box = "left";
    }

    $dummy_array = array(
        'id' => 1,
        'user_id' => $user_id,
        'domain' => $domain,
        // 'files' => $files
    );

    echo json_encode($dummy_array);

?>