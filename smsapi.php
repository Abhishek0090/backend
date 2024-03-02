<?php

    // https://sms.textspeed.in/vb/apikey.php?apikey=XXXXXXXXXXXXXXXXXXXX&senderid=XXXXXX&templateid=XXXXXXXX&number=XXXXXXXXXX,XXXXXXXXXX&message=Hello There
    $apikey = "pxINVBzPwnZL9TNd";
    $senderid = "BLUPEN";
    $templateid = "1707168372443710132";
    $number = "9619305482";
    $otp = 4532;
    $message = "Your one-time password is $otp. Please proceed with this One Time Password (OTP) within the next 5 minutes. Thank you, Team Bluepen";
    $message = urlencode($message);

    $url = "https://sms.textspeed.in/vb/apikey.php?apikey=$apikey&senderid=$senderid&templateid=$templateid&number=$number&message=$message";

    $output = file_get_contents($url);	/*default function for push any url*/

    echo $output;

?>