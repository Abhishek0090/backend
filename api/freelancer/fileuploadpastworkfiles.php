<?php

    // Headers
    header('Content-Type: multipart/form-data');
    header('Access-Control-Allow-Origin: *');
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

        $past_work_files=$_FILES['past_work_files']['name'];

        $error = $_FILES['past_work_files']['error'];
        
        $FileType = strtolower(pathinfo($past_work_files,PATHINFO_EXTENSION));

        for($j=0;$j<count($past_work_files);$j++)
        {
            $FileType = strtolower(pathinfo($past_work_files[$j],PATHINFO_EXTENSION));
            $arr = $random_number.$past_work_files[$j].'_$_'.$arr;
        }
        
        $flag = 0;
        $profileimage = count($past_work_files);
        $profiletarget2='';
        $amount=0;

        for( $i=0 ; $i < $profileimage ; $i++ )
        {
            $profiletarget = $_FILES['past_work_files']['tmp_name'][$i];
            $profiletarget2=$profiletarget2.','.$profiletarget;
            if ($profiletarget != "")
            {
                $old_name = $_FILES['past_work_files']['name'][$i];
                $new_name = str_replace("'", "", $old_name);
                $arr = str_replace("'", "", $arr);
                $profiletargetadmin = "../../files/uploads/freelancers/past_work_files/".$random_number.$new_name;
                if((move_uploaded_file($profiletarget, $profiletargetadmin)))
                {
                    $flag=0;
                    $arr = str_replace("'", "", $arr);
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
        VALUES ('freelancer_past_work_files', '$arr', '$now')";

        $insert_file_data = mysqli_query($conn, $insert_file_data_into_sql);

        $get_file_id  = "SELECT `id` FROM `uploaded_files` WHERE `file_name` = '$arr' AND `file_upload_date_time` = '$now'";
        $get_file_id_result = mysqli_query($conn, $get_file_id);
        $get_file_id_row = mysqli_fetch_assoc($get_file_id_result);
        $file_id = $get_file_id_row['id'];
        
        echo json_encode(array(
            // 'received data' => $data,
            'file_name' => $past_work_files,
            // 'temp name' => $profiletarget,
            // 'File Type' => $FileType,
            'number_of_files' => $profileimage,
            'file_name_string' => $arr,
            'flag' => $flag,
            'file_error' => $error,
            'file_id' => $file_id,
            'random_number' => $random_number,
            'received_random_number' => $received_random_number,
            'insert_into_sql' => $insert_file_data_into_sql,
            'type' => gettype(($arr[0])),
            'path' => $profiletargetadmin,
            'name' => $_FILES['past_work_files']['name'][0]
        ));
    }

    else
    {
        echo json_encode(array('message' => 'No data found'));
    }

?>