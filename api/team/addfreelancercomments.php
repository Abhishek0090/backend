<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $freelancer_id = $data['freelancer_id'];
    $team_role = $data['team_role'];
    $team_id = $data['team_id'];
    $title = $data['title'];
    $comment = $data['comment'];

    $commenter = $team_role . "_" . $team_id;

    $add_comment_sql = "INSERT INTO `freelancer_comments` (`freelancer_id`, `title`, `comment`, `commenter`, `commented_on`) VALUES ('$freelancer_id', '$title', '$comment', '$commenter', '$now')";
    $add_comment_result = mysqli_query($conn, $add_comment_sql);

    if($add_comment_result == true)
    {
        $status = 200;
        $message = "Comment Added Successfully";
    }
    else
    {
        $status = 400;
        $message = "Comment Adding Failed";
    }

    echo json_encode(
        array(
            "status" => $status,
            "message" => $message,
        ));

?>