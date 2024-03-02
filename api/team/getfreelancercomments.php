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

    $freelancer_comments = array();
    
    $get_freelancer_comments_sql = "SELECT * FROM `freelancer_comments` WHERE `freelancer_id` = '$freelancer_id' ORDER BY `id` DESC";
    $get_freelancer_comments_result = mysqli_query($conn, $get_freelancer_comments_sql);
    while($get_freelancer_comments_row = mysqli_fetch_assoc($get_freelancer_comments_result))
    {
        $comment_id = $get_freelancer_comments_row['id'];
        $title = $get_freelancer_comments_row['title'];
        $comment = $get_freelancer_comments_row['comment'];
        $commenter = $get_freelancer_comments_row['commenter'];
        $commented_on = $get_freelancer_comments_row['commented_on'];

        $commenter = explode("_", $commenter);

        $comment_array = array(
            "comment_id" => $comment_id,
            "title" => $title,
            "comment" => $comment,
            "commenter" => $commenter,
            "commented_on" => $commented_on
        );

        array_push($freelancer_comments, $comment_array);
    }

    echo json_encode($freelancer_comments);
?>