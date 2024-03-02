<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("d-m-Y H:i:s", strtotime("now"));

    $data = json_decode(file_get_contents("php://input"), true);

    $message_id = $data['message_id'];
    $freelancer_id = $data['freelancer_id'];

    // if read is empty then make an empty array to store all jsons of read data
        // make json of read data
        // push new json in array
        // update read_on with new array
    // else
        // decode read_on
        // make json of read data
        // push new json in array
        // update read_on with new array

    $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
    $get_freelancer_details = mysqli_query($conn, $get_freelancer_details_sql);
    $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details);
    $firstname = $get_freelancer_details_row['firstname'];
    $lastname = $get_freelancer_details_row['lastname'];
    $name = $firstname . " " . $lastname;
    $technical = $get_freelancer_details_row['technical'];
    if($technical == 1)
    {
        $role = "Technical";
    }
    else
    {
        $role = "Non-Technical";
    }

    $message_details_sql = "SELECT * FROM `group_chat_assignment` WHERE `id` = '$message_id'";
    $message_details = mysqli_query($conn, $message_details_sql);
    $message_details_row = mysqli_fetch_assoc($message_details);
    $read_on = $message_details_row['read_on'];

    if($read_on == null)
    {
        $read_data = array();
        
        $read_json = array(
            "read_on" => $now,
            "read_to" => $freelancer_id,
            "read_to_type" => "Freelancer",
            "read_to_name" => $name,
            "read_role" => $role,
        );

        array_push($read_data, $read_json);
        
        $read_json = json_encode($read_data);
        
        $update_message_data_sql = "UPDATE `group_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
        $update_message_data = mysqli_query($conn, $update_message_data_sql);
        if($update_message_data == true)
        {
            $status = "Message read";
        }
    }

    else
    {

        $read_array = array();
        
        $read_data = json_decode($read_on);

        foreach($read_data as $read)
        {
            array_push($read_array, $read->read_to);
        }
        $index_array = array_values(array_unique($read_array));
        
        if(!in_array($freelancer_id, $index_array))
        {
            $read_data = json_decode($read_on);
            $read_json = array(
                "read_on" => $now,
                "read_to" => $freelancer_id,
                "read_to_name" => $name,
                "read_role" => $role,
            );

            array_push($read_data, $read_json);
            $read_json = json_encode($read_data);

            $update_message_data_sql = "UPDATE `group_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
            $update_message_data = mysqli_query($conn, $update_message_data_sql);
            if($update_message_data == true)
            {
                $status = "Message read";
            }
        }

        // $read_data = json_decode($read_on, true);
        
        // $read_json = array(
        //     "read_on" => $now,
        //     "read_to" => $freelancer_id
        // );

        // array_push($read_data, $read_json);
        
        // $read_json = json_encode($read_data);
        
        // $update_message_data_sql = "UPDATE `group_chat_assignment` SET `read_on` = '$read_json' WHERE `id` = '$message_id'";
        // $update_message_data = mysqli_query($conn, $update_message_data_sql);
        // if($update_message_data == true)
        // {
        //     $status = "Message read";
        // }
    }
    
    echo json_encode(array(
        "status" => $status,
        // "sql" => $update_message_data_sql,
    ));

?>