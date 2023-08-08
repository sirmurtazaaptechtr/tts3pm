<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
// Data Types
    $data = "Ali";
    var_dump($data);
    echo "<br />";

    $data = 12;
    var_dump($data);
    echo "<br />";

    $data = 12.75;
    var_dump($data);
    echo "<br />";

    $data = true;
    var_dump($data);
    echo "<br />";

    $data = ["Ali",12,12.75,true];
    var_dump($data);
    echo "<br />";

    echo "<pre>";
    print_r($data);
    echo "</pre>";

    $data = null;
    var_dump($data);
    echo "<br />";

    $data = function ($input) {
        return $input*$input;
    };

    var_dump($data);
    echo "<br />";

    $res = $data(14);
    echo "<p>$res</p>";

// PHP Strings
    $str = "I Love Php";
    echo '<p>"'.$str.'" has '.strlen($str)." characters in it.</p>";
    echo "<p>".strrev($str)."</p>";
    echo "<p>Love in \"$str\" is at index ".strpos($str,"Love")."</p>";
    echo "<p>". str_replace("Love","Study",$str)."</p>";
    echo "<p>". strtolower($str)."</p>";
    echo "<p>". strtoupper($str)."</p>";

    $str1 = "Ali";
    $str2 = "Raza";
    $str3 = "Khan";

    echo "<p>". strnatcmp($str1,$str2)."</p>";
    echo "<p>". strnatcmp($str2,$str3)."</p>";
    echo "<p>". strnatcmp("Khan",$str3)."</p>";
?>
    
</body>
</html>