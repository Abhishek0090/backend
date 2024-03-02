<?php
    session_start();
    $dbServername = "sql12.freemysqlhosting.net";
    $dbUsername = "sql12675396";
    $dbPassword = "h1IwbmN9SV";
    $dbName = "sql12675396";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Connection failed");

    error_reporting(0);
    // echo json_encode(array(
    //     "status" => 200,
    //     // "data" => "Connected to writeyfy database",
    //     "conn" => $conn,
    // ));
?>