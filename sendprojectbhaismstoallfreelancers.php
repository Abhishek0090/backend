<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707170210077097567";

    $data_array = array();
    $get_data_sql = "SELECT * FROM `freelancers_map` ORDER BY `id` DESC LIMIT 50 OFFSET 550";
    $get_data_result = mysqli_query($conn, $get_data_sql);
    while($get_data_row = mysqli_fetch_assoc($get_data_result))
    {
        $id = $get_data_row['id'];
        $email = $get_data_row['email'];
        $country_name = $get_data_row['country_name'];
        $country_code = $get_data_row['country_code'];
        $number = $get_data_row['number'];
        $firstname = $get_data_row['firstname'];
        // $lastname = $get_data_row['lastname'];
        $name = $firstname;
        

        // check if country code is 91 or 0
        // if yes, check if number contains '-' (dash)
        // if yes then eliminate all characters before dash, including dash
        // check if number is 10 digit, if yes then send sms

        if($country_code == "91" || $country_code == "0")
        {
            // also add condition for country name. freelancer 334, 248, 162 are outliers
            // 164 is a unique outlier
            if(strpos($number, '-') !== false)
            {
                $number = substr($number, strpos($number, '-') + 1);
            }
            if(strlen($number) == 10)
            {
                if($number == 9004185304 || $number == 9892251891)
                {
                    continue;
                }
                else
                {
                    $message = "Dear ".$name.", What if we tell you that your projects have a value except for marks as well? Introducing Project Bhai by Bluepen - a marketplace to buy and sell projects. Visit - www.projectbhai.com and start selling your projects. #monetiseyourskill";
                    $message = urlencode($message);
                    
                    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
                    
                    // $output = file_get_contents($url);
                    
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
                    array_push($data_array, $data);
                }
                // if($number != 9004185304 || $number != 9892251891)
                // {
                //     $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
                //     $message = urlencode($message);
                    
                //     $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
                    
                //     // $output = file_get_contents($url);
                //     $data = array(
                //         'id' => $id,
                //         'email' => $email,
                //         'country_name' => $country_name,
                //         'country_code' => $country_code,
                //         'number' => $number,
                //         'name' => $name,
                //         'message' => $message,
                //         'output' => $output
                //     );
                //     array_push($data_array, $data);
                // }
                // else
                // {
                //     continue;
                // }
                // array_push($data_array, $data);
            }
        }

    }
    // echo json_encode(count($data_array));
    echo json_encode($data_array);

?>