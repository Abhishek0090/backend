<?php

    // Headers
    header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    if (isset($_POST['submit']))
    {
        $data = file_get_contents("php://input");

        $received_random_number = mysqli_real_escape_string($conn, $_POST['random_number']);

        if ($received_random_number == NULL)
        {
            $random_number = mt_rand(1000,9999);
        }
        else
        {
            $random_number = $received_random_number;
        }

        $profile_photo=$_FILES['profile_photo']['name'];

        $error = $_FILES['profile_photo']['error'];
        
        $FileType = strtolower(pathinfo($profile_photo,PATHINFO_EXTENSION));

        for($j=0;$j<count($profile_photo);$j++)
        {
            $FileType = strtolower(pathinfo($profile_photo[$j],PATHINFO_EXTENSION));
            $arr = $random_number.$profile_photo[$j].'_$_'.$arr;
        }
        
        $flag = 0;
        $profileimage = count($profile_photo);
        $profiletarget2='';
        $amount=0;

        for( $i=0 ; $i < $profileimage ; $i++ )
        {
            $profiletarget = $_FILES['profile_photo']['tmp_name'][$i];
            $profiletarget2=$profiletarget2.','.$profiletarget;
            if ($profiletarget != "")
            {
                $profiletargetadmin = "../../files/uploads/freelancers/profile_photo/".$random_number.$_FILES['profile_photo']['name'][$i];
                if((move_uploaded_file($profiletarget, $profiletargetadmin)))
                {
                    $flag=0;
                }
                else
                {
                    $flag=1;
                }
            }
        }

        date_default_timezone_set("Asia/Kolkata");
        $now = date("Y-m-d H:i:s", strtotime("now"));

        $insert_file_data_into_sql = "INSERT INTO `uploaded_files_freelancer`(`file_source`, `file_name`, `file_upload_date_time`)
        VALUES ('freelancer_profile_photo', '$arr', '$now')";

        $insert_file_data = mysqli_query($conn, $insert_file_data_into_sql);

        $get_file_id  = "SELECT `id` FROM `uploaded_files` WHERE `file_name` = '$arr' AND `file_upload_date_time` = '$now'";
        $get_file_id_result = mysqli_query($conn, $get_file_id);
        $get_file_id_row = mysqli_fetch_assoc($get_file_id_result);
        $file_id = $get_file_id_row['id'];
        
        echo json_encode(array(
            // 'received data' => $data,
            'file_name' => $profile_photo,
            // 'temp name' => $profiletarget,
            // 'File Type' => $FileType,
            'number_of_files' => $profileimage,
            'file_name_string' => $arr,
            'flag' => $flag,
            'file_error' => $error,
            'file_id' => $file_id,
            'random_number' => $random_number,
            'received_random_number' => $received_random_number,
        ));
    }

    else
    {
        echo json_encode(array('message' => 'No data found'));
    }

?>