<?php
    $fullname = $email = "";
    
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";

    if(isset($_REQUEST['submitBtn'])) {
        $fullname = $_REQUEST['nameTb'];
        $email = $_REQUEST['emailTb'];
    }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Personal Information Card</h1>
    <form action="form.php" method="get">
        <input type="text" name="nameTb" id="fullname" placeholder="Enter Full Name">
        <br><br>
        <input type="email" name="emailTb" id="email" placeholder="abc@example.com">
        <br><br>
        <input type="submit" value="Save" name="submitBtn">
    </form>

    <h4>        
        <?php
            if($fullname != "" && $email != "") {
                echo "Dear $fullname, your email address is $email."; 
            } 
        ?>
    </h4>
</body>
</html>