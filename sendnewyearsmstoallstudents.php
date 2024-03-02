<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707170411655843224";

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
            $message = "Greetings ".$name.", Team Bluepen extends sincere wishes for a Happy New Year! As we usher in 2024, may your academic pursuits be marked by scholarly achievements. Here's to a year of elevated academic endeavors and shared accomplishments. Warm regards from Team Bluepen!";
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
            
            // if($number != 9004185304 || $number != 9892251891)
            // {
                
            // }
            // else
            // {
            //     continue;
            // }
            
            array_push($data_array, $data);
        }
    }
    // echo json_encode($data_array);
    // echo json_encode(count($data_array));
    echo json_encode(array(
        "count" => count($data_array),
        "data" => $data_array
    ));

?>