<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707169953228815246";

    $data_array = array();

    $number = 9920925648;
    $name = "Gagan";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);

    $number = 8652186403;
    $name = "Prathamesh";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);

    $number = 8390640260;
    $name = "Pushkar";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);

    $number = 8879000906;
    $name = "Anagha";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);

    $number = 7718983795;
    $name = "Karan";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);

    $number = 9820804585;
    $name = "Sahil";
    $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    $message = urlencode($message);
    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";
    $output = file_get_contents($url);
    $data = array(
        'number' => $number,
        'name' => $name,
        'message' => $message,
        'output' => $output
    );
    array_push($data_array, $data);
    
    // $get_data_sql = "SELECT * FROM `freelancers_map` ORDER BY `id` DESC";
    // $get_data_result = mysqli_query($conn, $get_data_sql);
    // while($get_data_row = mysqli_fetch_assoc($get_data_result))
    // {
    //     $id = $get_data_row['id'];
    //     $email = $get_data_row['email'];
    //     $country_name = $get_data_row['country_name'];
    //     $country_code = $get_data_row['country_code'];
    //     $number = $get_data_row['number'];
    //     $firstname = $get_data_row['firstname'];
    //     // $lastname = $get_data_row['lastname'];
    //     $name = $firstname;
        

    //     if($country_code == "91" || $country_code == "0")
    //     {
    //         if(strpos($number, '-') !== false)
    //         {
    //             $number = substr($number, strpos($number, '-') + 1);
    //         }
    //         if(strlen($number) == 10)
    //         {
    //             array_push($data_array, $data);
    //             $message = "Hey ".$name.", Your presence in our life is that of a rocket, which takes off to burst into a thousand moments of happiness. Happy Diwali!! From Team Bluepen";
    //             $message = urlencode($message);

    //             $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";

    //             $output = file_get_contents($url);
    //             $data = array(
    //                 'id' => $id,
    //                 'email' => $email,
    //                 'country_name' => $country_name,
    //                 'country_code' => $country_code,
    //                 'number' => $number,
    //                 'name' => $name,
    //                 'message' => $message,
    //                 'output' => $output
    //             );
    //             array_push($data_array, $data);
    //         }
    //     }

    // }
    echo json_encode($data_array);
    // echo json_encode(count($data_array));

?>