<?php
    date_default_timezone_set("Asia/Karachi");

    $cookie_name = "user";
    $cookie_value = "Ali Baba";
    // $cookie_value = json_encode(["Ali Baba","Chalis Choor"]);
    $cookie_expiry = time() + 30 * 24 * 60 * 60;
    $cookie_path = "/";

    setcookie($cookie_name,$cookie_value,$cookie_expiry,$cookie_path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_COOKIE[$cookie_name])) {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
            // $cookie_data = json_decode($_COOKIE[$cookie_name]);
            // foreach($cookie_data as $index => $value) {
            //     echo $index+1 . " Value = $value <br>";
            // }
        }else {
            echo "Cookie '" . $cookie_name . "' is not set!<br>";
        }
    ?>
    
</body>
</html>