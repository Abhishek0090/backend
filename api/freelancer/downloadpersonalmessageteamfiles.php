<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $chat_id = $_GET['chat_id'];
    $message_id = $_GET['message_id'];
    $file_name = $_GET['file_name'];
    
    $u_id = "C-".$chat_id. " M-".$message_id; 

    $file_link = "chat/team_freelancer_personal/".$u_id.'_'.$file_name;
    
    if (file_exists($file_link) == true)
    {
        // $file_url = 'http://localhost/blue-pen-backend/api/team/filedownload.php?link='.$file_link;
        // $file_url = 'https://test.bluepen.co.in/api/team/filedownload.php?link='.$file_link;
        $file_url = 'https://bluepen.co.in/api/team/filedownload.php?link='.$file_link;
            $response = array(
            'status' => 'success', 
            'file_url' => $file_url,
            'file_link' => $file_link,
            'file_exists' => file_exists($file_link),
            'file_name' => $file_name,
            'server_file_name' => $u_id.'_'.$file_name,
        );
    }
    else if(file_exists($file_link) == false)
    {
        $response = array(
            'status' => 'error', 
            'message' => 'File not present',
            'u_id' => $u_id,
            'file_name' => $file_name,
            'file_link' => $file_link,
        );
    }

    
    echo json_encode($response);
?>  