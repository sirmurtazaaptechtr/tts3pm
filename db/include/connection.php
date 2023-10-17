<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "tts3pm_db";

    $conn = mysqli_connect($hostname,$username,$password,$database);

    if($conn) {
        echo "$database is connected successfully";
    }