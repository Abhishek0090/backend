<?php

    // Headers
    header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    if (isset($_POST['submit']))
    {
        date_default_timezone_set('Asia/Kolkata');

        $data = file_get_contents("php://input");

        $assignment=$_FILES['assignment']['name'];

        $error = $_FILES['assignment']['error'];
        
        $FileType = strtolower(pathinfo($assignment,PATHINFO_EXTENSION));

        for($j=0;$j<count($assignment);$j++)
        {
            $FileType = strtolower(pathinfo($assignment[$j],PATHINFO_EXTENSION));
            $arr=$assignment[$j].'_$_'.$arr;
        }
        
        $flag = 0;
        $profileimage = count($assignment);
        $profiletarget2='';
        $amount=0;

        for( $i=0 ; $i < $profileimage ; $i++ )
        {
            $profiletarget = $_FILES['assignment']['tmp_name'][$i];
            $profiletarget2=$profiletarget2.','.$profiletarget;
            if ($profiletarget != "")
            {
                $profiletargetadmin = "../../uploads/past_work_files/".$_FILES['assignment']['name'][$i];
                // $profiletargethr = "../hr/submission/".$_FILES['assignment']['name'][$i];
                // $profiletargetpm = "../pm/submission/".$_FILES['assignment']['name'][$i];
                // $profiletargetfreelancers = "../freelancers/submission/".$_FILES['assignment']['name'][$i];
                if((move_uploaded_file($profiletarget, $profiletargetadmin)))
                {
                    $flag=0;
                }
                else
                {
                    $flag=1;
                }
                // var_dump($flag);
                // if(copy($profiletargetadmin,$profiletargetpm))
                // {
                //     $flag=0;
                // }
                // else
                // {
                //     $flag=1;
                // }
                // if(copy($profiletargetadmin,$profiletargetfreelancers))
                // {
                //     $flag=0;
                // }
                // else
                // {
                //     $flag=1;
                // }
                // if(copy($profiletargetadmin,$profiletargethr))
                // {
                //     $flag=0;
                // }
                // else
                // {
                //     $flag=1;
                // }
                // var_dump($flag);
            }
        }


        echo json_encode(array(
            'submitted data' => $data,
            'name' => $assignment,
            'temp name' => $profiletarget,
            'File Type' => $FileType,
            'count' => $profileimage,
            'array' => $arr,
            'flag' => $flag,
            'file error' => $error,
        ));
    }

    else
    {
        echo json_encode(array('message' => 'No data found'));
    }

?>