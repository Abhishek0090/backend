<?php
    session_start();
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "blue-pen";

    $old_conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");

    // error_reporting(0);

    // var_dump($old_conn);
?>