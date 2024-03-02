<?php
    header("Content-Type: text/event-stream");
    header("Cache-Control: no-cache");

    // Set the time limit to unlimited
    set_time_limit(0);

    $i = 0;
    while (true) {
        // Get the current time on server
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date("h:i:s", time());

        // Send it in a message
        $message = array(
            "ID" => $i,
            "time" => $currentTime
        );
        echo "data: " . json_encode($message) . "\n\n";
        $i++;
        flush();

        // Sleep for 1 second before sending the next event
        sleep(1);
    }
?>