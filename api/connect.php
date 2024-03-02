<?php
    session_start();
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "blue-temp";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");

    error_reporting(0);
?>