<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707169953228815246";

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
            array_push($data_array, $data);
            $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
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
    }
    echo json_encode($data_array);
    // echo json_encode(count($data_array));

?>