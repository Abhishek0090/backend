<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $freelancer_id = $_GET['freelancer_id'];
    // $domain = $_GET['domain'];
    $file_name = $_GET['file_name'];
    
    $file_link = 'freelancers/past_work_files/'.$freelancer_id.'_'.$file_name;
    if (file_exists($file_link) == true)
    {
        // $file_url = 'http://localhost/blue-pen-backend/api/team/filedownload.php?link=../../files/freelancers/past_work_files/'.$freelancer_id.'_'.$file_name;
        // $file_url = 'https://test.bluepen.co.in/api/team/filedownload.php?link='.$file_link;
        $file_url = 'https://bluepen.co.in/api/team/filedownload.php?link='.$file_link;
            $response = array(
            'status' => 'success', 
            'freelancer_id' => $freelancer_id,
            'file_url' => $file_url,
            'file_link' => $file_link,
            'file_exists' => file_exists($file_link),
            'file_name' => $file_name
        );
    }
    else if(file_exists($file_link) == false)
    {
        $response = array(
            'status' => 'error', 
            'message' => 'File not present',
            'freelancer_id' => $freelancer_id,
            'file_name' => $file_name,
        );
    }
    
    echo json_encode($response);
?>  