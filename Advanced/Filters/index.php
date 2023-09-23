<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // echo "<pre>";
        // print_r(filter_list());
        // echo "</pre>";

        $str = "<h1>Hello World!</h1>";
        $newstr = filter_var($str, FILTER_SANITIZE_STRING);
        echo $newstr;

        $data = 12.7;
        if(filter_var($data,FILTER_VALIDATE_INT)) {
            echo "<br>$data is a valid integer";
        }else {
            echo "<br>$data is not a valid integer";
        }

        $ip = "192.168.1.1";
        
        if(filter_var($ip,FILTER_VALIDATE_IP)) {
            echo "<br> IP Address is valid";
        }else{
            echo "<br> Invalid IP Address";
        }
        $email = "john.doeexample.com";
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "<br> $email is a valid email address";
        }else {
            echo "<br> $email is invalid email address";
        }


        $url = "https://www.msn.com/en-xl/sports?ocid=msedgntphdr&cvid=07d7cd3b43ba48128754d8df893a9907";
        
        // Remove all illegal characters from a url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Validate url
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo("<br>$url is a valid URL");
        } else {
            echo("<br>$url is not a valid URL");
        }

        $marks = 19;
        $min_marks = 0;
        $max_marks = 20;

        if(filter_var($marks,FILTER_VALIDATE_INT,array("options"=>array("min_range"=>$min_marks,"max_range"=>$max_marks)))){
            echo "<br>$marks is a valid integer between 0 and 20";
        }else{
            echo "<br>$marks is either invalid integer or not between 0 and 20";
        }

        $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
        // $ip = "192.168.0.1";
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
            echo("<br>$ip is a valid IPv6 address");
        } else {
            echo("<br>$ip is not a valid IPv6 address");
        }

        function validate_ip ($input) {
            if(filter_var($input,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4)){
                echo "<br>$input is valid IPV4";
            }elseif(filter_var($input,FILTER_VALIDATE_IP,FILTER_FLAG_IPV6)){
                echo "<br>$input is valid IPV6";
            }else{
                echo "<br>$input is nither valid IPV4 nor IPV6";
            }
        }

        validate_ip("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");
        validate_ip("127.0.0.1");
        validate_ip("257.0.0.1");

        // $url = "https://www.w3schools.com";
        $url = "https://www.w3schools.com?name=ferret&color=purple";
        if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) 
        {
            echo("<br>$url is a valid URL with a query string");
        } else {
            echo("<br>$url is not a valid URL with a query string");
        }

        $str = "<h1>Hello WorldÆØÅΩ!</h1>";
        $newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        echo "<br>$newstr";
    ?>
</body>
</html>