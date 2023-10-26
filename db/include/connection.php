<?php
    session_start();
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "tts3pm_db";

    $conn = mysqli_connect($hostname,$username,$password,$database);
    
// Check Connection
    if($conn) {
        echo "$database is connected successfully";
    }

// Extra Functions
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function pr($input) {
        echo "<pre>";
        print_r($input);
        echo "</pre>";
    }

    function prx($input) {
        echo "<pre>";
        print_r($input);
        echo "</pre>";
        die();
    }