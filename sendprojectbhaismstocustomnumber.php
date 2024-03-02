<?php
    
    include 'api/connect.php';

    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707170411655843224";

    $data_array = array();

    $number = 9619305482;
    $name = "Bhavya";
    $message = "Greetings ".$name.", Team Bluepen extends sincere wishes for a Happy New Year! As we usher in 2024, may your academic pursuits be marked by scholarly achievements. Here's to a year of elevated academic endeavors and shared accomplishments. Warm regards from Team Bluepen!";
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

    echo json_encode($data_array);
    // echo json_encode(count($data_array));

?>