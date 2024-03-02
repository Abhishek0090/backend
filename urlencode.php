<?php

// get user email and check if it exists
// if present then get id
// generate url salt with et and item as given below
// make new api to check salt on page load
// if valid then accept new password and update
// if time expired then show time expired message
// else show invalid link

    date_default_timezone_set('Asia/Kolkata');
    // $now = date("d-m-Y H:i:s");
    // echo "current time is ".$now;
    // echo "<br>";

    // $encoded = urlencode($now);
    // echo "encoded time is ".$encoded;

    $id = 24;
    echo "user id ". $id;
    echo "<br>";
    
    $today = date("n/j/Y,g:i a");
    echo "current time is ".$today;
    echo "<br>";
    
    $et = date("n/j/Y,g:i a",strtotime('+1 hour',strtotime($today)));
    echo "expiry time is ".$et;
    echo "<br>";
    
    $et1 = strtotime($et);
    echo "expiry time in seconds is ".$et1;
    echo "<br>";
    
    $link = "bluepen.co.in/forget_password1.php?et=".$et1."&item=".urlencode(base64_encode($id));
    echo $link;
    echo "<br>";

    echo date('h:i:s') . "<br>";

    sleep(3);

    echo date('h:i:s') . "<br>";

    // $et=$_GET['et'];
    $today = date("n/j/Y,g:i a");
    echo "current time is ".$today;
    echo "<br>";

    if(strtotime($today) > $et)
    {
        // header("Location: forget_password.php?forget=exp");
        // exit();
        echo "expired";
        echo "<br>";
    }

    // $item=$_GET['item'];
    $item = urlencode(base64_encode($id));
    echo "item is ".$item;
    echo "<br>";
    
    $id= base64_decode(urldecode($item));
    echo "id is ".$id;
    echo "<br>";
?>
