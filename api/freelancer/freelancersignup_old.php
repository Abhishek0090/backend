<?php

    // Headers
    // header('Content-Type: multipart/form-data');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    if (isset($_POST['submit']))
    {
        date_default_timezone_set('Asia/Kolkata');

        $data = file_get_contents("php://input");

        $freelancer_email = mysqli_real_escape_string($conn, $_POST['email']);
        $freelancer_email_verified = mysqli_real_escape_string($conn, $_POST['email_verified']);
        $freelancer_country = mysqli_real_escape_string($conn, $_POST['country']);
        $freelancer_number = mysqli_real_escape_string($conn, $_POST['number']);
        $freelancer_number_verified = mysqli_real_escape_string($conn, $_POST['number_verified']);
        $freelancer_role = mysqli_real_escape_string($conn, $_POST['role']);
        
        $register_for_technical = 0;
        $register_for_non_technical = 0;
        $register_for_writer = 0;

        if ($freelancer_role === "Technical")
            $register_for_technical = 1;
        else if ($freelancer_role === "Non Technical")
            $register_for_non_technical = 1;
        else if ($freelancer_role === "Writer")
            $register_for_writer = 1;

        $is_email_present = 0;
        $is_number_present = 0;

        $technical_present = 0;
        $non_technical_present = 0;
        $writer_present = 0;

        $check_email_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email'";
        $check_email_result = mysqli_query($conn, $check_email_sql);
        $check_email_row = mysqli_fetch_assoc($check_email_result);
        $check_email_num = mysqli_num_rows($check_email_result);

        if ($check_email_num == 1)
            $is_email_present = 1;

        $check_number_sql = "SELECT * FROM `freelancers_map` WHERE `number` = '$freelancer_number'";
        $check_number_result = mysqli_query($conn, $check_number_sql);
        $check_number_row = mysqli_fetch_assoc($check_number_result);
        $check_number_num = mysqli_num_rows($check_number_result);

        if ($check_number_num == 1)
            $is_number_present = 1;
        
        // echo json_encode(array(
        //     // "message" => "You are already registered as a freelancer.", 
        //     "sql" => $check_email_sql,
        //     // "id" => $check_email_row['id'],
        //     "role" => $freelancer_role,
        //     "register for technical" => $register_for_technical,
        //     "register for non technical" => $register_for_non_technical,
        //     "register for writer" => $register_for_writer,
        //     "email present" => $is_email_present,
        //     "number present" => $is_number_present,
        // ));

        if($is_email_present == 1 && $is_number_present == 1)
        {

            $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email' AND `number` = '$freelancer_number'";
            $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
            $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details_result);
            $get_freelancer_details_num = mysqli_num_rows($get_freelancer_details_result);

            if($get_freelancer_details_row['technical'] == 1)
                $technical_present = 1;
            if($get_freelancer_details_row['non technical'] == 1)
                $non_technical_present = 1;
            if($get_freelancer_details_row['writer'] == 1)
                $writer_present = 1;

                // echo json_encode(array(
                //     "message" => "You are already registered as a freelancer.", 
                //     "sql" => $get_freelancer_details_sql,
                //     "id" => $get_freelancer_details_row['id'],
                //     "register for technical" => $register_for_technical,
                //     "technical present" => $get_freelancer_details_row['technical'],
                //     "status" => false
                // ));

                $freelancer_id = $get_freelancer_details_row['id'];

            if($register_for_technical == 1)
            {
                if($technical_present == 1)
                {
                    echo json_encode(array("message" => "You are already registered as a technical freelancer.", "status" => false));
                    die();
                }
                else
                {
                    echo json_encode(array(
                        "message" => "update map table and insert data in technical freelancers table.", 
                        "status" => true,
                        "id" => $freelancer_id
                    ));
                    // pass freelancer id to function
                    update_to_add_technical($freelancer_id);
                }
            }

            if($register_for_non_technical == 1)
            {
                if($non_technical_present == 1)
                {
                    echo json_encode(array("message" => "You are already registered as a non technical freelancer.", "status" => false));
                    die();
                }
                else
                {
                    // echo json_encode(array("message" => "update map table and insert data in non technical freelancers table.", "status" => true));
                    // pass freelancer id to function
                    update_to_add_non_technical($get_freelancer_details_row['id']);
                }
            }

            if($register_for_writer == 1)
            {
                if($writer_present == 1)
                {
                    echo json_encode(array("message" => "You are already registered as a writer.", "status" => false));
                    die();
                }
                else
                {
                    // echo json_encode(array("message" => "update map table and insert data in writers table.", "status" => true));
                    // pass freelancer id to function
                    update_to_add_writer($get_freelancer_details_row['id']);
                }
            }
        }

        else if($is_email_present == 0 && $is_number_present == 0)
        {
            // insert data in map table and insert data in respective table
            echo json_encode(array(
                "message" => "insert data in map table and insert data in respective table.",
                "role" => $freelancer_role,
                "status" => true));
            // new_freelancer_signup();

            if($freelancer_role === "Technical")
            {
                $data_in_map_sql = "INSERT INTO `freelancers_map`(`email`, `email_verified`, `country`, `number`, `number_verified`, `technical`, `non technical`, `writer`) VALUES ('$freelancer_email', '$freelancer_email_verified', '$freelancer_country', '$freelancer_number', '$freelancer_number_verified', 1, 0, 0)";
                $data_in_map = mysqli_query($conn, $data_in_map_sql);
    
                $get_freelancer_id_sql = "SELECT `id` FROM `freelancers_map` WHERE `email` = '$freelancer_email' ORDER BY `id` DESC LIMIT 1";
                $get_freelancer_id_result = mysqli_query($conn, $get_freelancer_id_sql);
                $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
                $freelancer_id = $get_freelancer_id_row['id'];

                $assignment_type = mysqli_real_escape_string($conn, $_POST['assignment_type']);
                $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
                $working_hours = mysqli_real_escape_string($conn, $_POST['working_hours']);
                $subject_tags = mysqli_real_escape_string($conn, $_POST['subject_tags']);
                $past_experience = mysqli_real_escape_string($conn, $_POST['past_experience']);
                $work_links = mysqli_real_escape_string($conn, $_POST['work_links']);
                $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
                $experience = mysqli_real_escape_string($conn, $_POST['experience']);

                $now = date("d-m-Y H:i:s");

                $past_work_files=$_FILES['past_work_files']['name'];
                $FileType = strtolower(pathinfo($past_work_files,PATHINFO_EXTENSION));

                for($j=0;$j<count($past_work_files);$j++)
                {
                    $FileType = strtolower(pathinfo($past_work_files[$j],PATHINFO_EXTENSION));
                    $arr=$past_work_files[$j].'_^_'.$arr;
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
                        $profiletargetadmin = "../../files/freelancers/past_work_files/".$freelancer_id."-technical-".$_FILES['past_work_files']['name'][$i];
                        
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


                echo json_encode(array(
                    // 'message' => 'Freelancer added successfully',
                    'freelancer_id' => $freelancer_id,
                    'name' => $past_work_files,
                    'File Type' => $FileType,
                    'count' => $profileimage,
                    'array' => $arr,
                    'flag' => $flag,
                ));

                
                $insert_into_technical_freelancers_sql = "INSERT INTO `freelancers_technical`(`freelancer_id`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`, `date_of_submission`) 
                VALUES ('$freelancer_id', '$assignment_type', '$qualification', '$working_hours', '$subject_tags', '$past_experience', '$work_links', '$linkedin', '$experience', '$past_work_files', '$resume', '$now')";
                $insert_into_technical_freelancers = mysqli_query($conn, $insert_into_technical_freelancers_sql);

                if($insert_into_technical_freelancers)
                {
                    echo json_encode(array(
                        'message' => 'Freelancer added successfully', 
                        'freelancer_id' => $freelancer_id
                    ));
                }
                else
                {
                    echo json_encode(array(
                        'message' => 'Freelancer not added',
                        'map' => $data_in_map_sql,
                        'id_sql'=> $get_freelancer_id_sql,
                        'technical' => $insert_into_technical_freelancers_sql
                    ));
                }
            }

            if($freelance_role === "Non Technical")
            {
                
                echo json_encode(array(
                    'message' => 'Non tech Freelancer condition satisfied',
                    // 'freelancer_id' => $freelancer_id
                ));
                // $data_in_map_sql = "INSERT INTO `freelancers_map`(`email`, `email_verified`, `country`, `number`, `number_verified`, `technical`, `non technical`, `writer`) VALUES ('$freelancer_email', '$freelancer_email_verified', '$freelancer_country', '$freelancer_number', '$freelancer_number_verified', 0, 1, 0)";
                // $data_in_map = mysqli_query($conn, $data_in_map_sql);
    
                // $get_freelancer_id_sql = "SELECT `id` FROM `freelancers_map` WHERE `email` = '$freelancer_email' ORDER BY `id` DESC LIMIT 1";
                // $get_freelancer_id_result = mysqli_query($conn, $get_freelancer_id_sql);
                // $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
                // $freelancer_id = $get_freelancer_id_row['id'];

                // $assignment_type = mysqli_real_escape_string($conn, $_POST['assignment_type']);
                // $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
                // $working_hours = mysqli_real_escape_string($conn, $_POST['working_hours']);
                // $subject_tags = mysqli_real_escape_string($conn, $_POST['subject_tags']);
                // $past_experience = mysqli_real_escape_string($conn, $_POST['past_experience']);
                // $work_links = mysqli_real_escape_string($conn, $_POST['work_links']);
                // $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
                // $experience = mysqli_real_escape_string($conn, $_POST['experience']);
                // $past_work_files = mysqli_real_escape_string($conn, $_POST['past_work_files']);
                // $resume = mysqli_real_escape_string($conn, $_POST['resume']);
                // $now = date("d-m-Y H:i:s");

                // echo json_encode(array(
                //     'message' => 'Entered Non Tech condition for new freelancer',
                //     'freelancer_id' => $freelancer_id,
                //     // 'assignment_type' => $assignment_type,
                //     // 'qualification' => $qualification,
                //     // 'working_hours' => $working_hours,
                //     // 'subject_tags' => $subject_tags,
                //     // 'past_experience' => $past_experience,
                //     // 'work_links' => $work_links,
                //     // 'linkedin' => $linkedin,
                //     // 'experience' => $experience,
                //     // 'past_work_files' => $past_work_files,
                //     // 'resume' => $resume,
                //     // 'now' => $now
                // ));
            }

        }

        else
        {
            // return message, you are already registered but the entered email id and number do not match
            echo json_encode(array("message" => "You are already registered but the entered email id and number do not match.", "status" => false));
        }


        function new_freelancer_signup()
        {
            echo json_encode(array(
                'message' => 'Freelancer added successfully'
            ));
        }

        function update_to_add_technical($freelancer_id)
        {
            echo json_encode(array(
                'message' => 'Added to technical freelancers',
                'freelancer_id' => $freelancer_id
            ));
        }

        function update_to_add_non_technical($freelancer_id)
        {
            echo json_encode(array(
                'message' => 'Added to non technical freelancers',
                'freelancer_id' => $freelancer_id
            ));
        }

        function update_to_add_writer($freelancer_id)
        {
            echo json_encode(array(
                'message' => 'Added to writer',
                'freelancer_id' => $freelancer_id
            ));
        }
    }
    
?>