<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707170210077097567";

    $data_array = array();
    $get_data_sql = "SELECT * FROM `users` ORDER BY `id` DESC";
    $get_data_result = mysqli_query($conn, $get_data_sql);
    while($get_data_row = mysqli_fetch_assoc($get_data_result))
    {
        $id = $get_data_row['id'];
        $email = $get_data_row['email'];
        $country_name = $get_data_row['country_name'];
        $country_code = $get_data_row['country_code'];
        $number = $get_data_row['number'];
        $firstname = $get_data_row['firstname'];
        $lastname = $get_data_row['lastname'];
        $name = $firstname." ".$lastname;
                
        if($country_code == "91" || $country_code == "0")
        {
            if($number != 9004185304 || $number != 9892251891)
            {
                $message = "Dear ".$name.", What if we tell you that your projects have a value except for marks as well? Introducing Project Bhai by Bluepen - a marketplace to buy and sell projects. Visit - www.projectbhai.com and start selling your projects. #monetiseyourskill";
                $message = urlencode($message);
                
                $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
                // $output = file_get_contents($url);
                
                // array_push($data_array, $data);
                
                $data = array(
                    'id' => $id,
                    'email' => $email,
                    'country_name' => $country_name,
                    'country_code' => $country_code,
                    'number' => $number,
                    'name' => $name,
                    'message' => $message,
                    'output' => $output
                );
            }
            else
            {
                continue;
            }
            
            array_push($data_array, $data);
        }
    }
    echo json_encode($data_array);
    // echo json_encode(count($data_array));

?>