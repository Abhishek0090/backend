<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $writer_id = $_GET['writer_id'];
    $section = $_GET['section'];
    $file_name = $_GET['file_name'];

    if($section == "writing")
    {
        $file_link = '../../files/writers/writing_sample/'.$writer_id.'_'.$file_name;
        if (file_exists($file_link) == true)
        {
            $file_url = 'http://localhost/blue-pen-backend/api/student/filedownload.php?link=../../files/writers/writing_sample/'.$writer_id.'_'.$file_name;
                $response = array(
                'status' => 'success', 
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
                'domain' => 'writing',
            );
        }
        
    }

    if($section == "diagram")
    {
        $file_link = '../../files/writers/diagram_sample/'.$writer_id.'_'.$file_name;
        if (file_exists($file_link) == true)
        {
            $file_url = 'http://localhost/blue-pen-backend/api/student/filedownload.php?link=../../files/writers/diagram_sample/'.$writer_id.'_'.$file_name;
                $response = array(
                'status' => 'success', 
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
                'domain' => 'diagram',
                'message' => 'File not present',
                'file_link' => $file_link,
            );
        }
    }

    if($section == "ed")
    {
        $file_link = '../../files/writers/technical_drawing_sample/'.$writer_id.'_'.$file_name;
        if (file_exists($file_link) == true)
        {
            $file_url = 'http://localhost/blue-pen-backend/api/student/filedownload.php?link=../../files/writers/technical_drawing_sample/'.$writer_id.'_'.$file_name;
                $response = array(
                'status' => 'success', 
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
                'domain' => 'ed',
            );
        }
    }

    if($section == "art")
    {
        $file_link = '../../files/writers/art_and_craft_sample/'.$writer_id.'_'.$file_name;
        if (file_exists($file_link) == true)
        {
            $file_url = 'http://localhost/blue-pen-backend/api/student/filedownload.php?link=../../files/writers/art_and_craft_sample/'.$writer_id.'_'.$file_name;
                $response = array(
                'status' => 'success', 
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
                'domain' => 'art',
            );
        }
    }
    
    echo json_encode($response);
?>  