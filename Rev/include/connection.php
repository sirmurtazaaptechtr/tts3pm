<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'northwind';

    $conn = mysqli_connect($hostname,$username,$password,$database);

    if($conn){
        echo $database . " is connected successfully!";
    }