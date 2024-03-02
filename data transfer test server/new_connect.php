<?php
    session_start();
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "blue-temp";

    $new_conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");

    // error_reporting(0);

     // var_dump($new_conn);
?>