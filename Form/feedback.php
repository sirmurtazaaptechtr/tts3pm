<?php
    $name = $email = $website = $comment = $gender = "";
    $nameError = $emailError = $websiteError = $commentError = $genderError = "";    
    function cleandata($input) {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    if(isset($_POST['submitBtn'])) {
        if(empty($_POST['fullname'])) {
            $nameError = "name is required";
        }
        else {
            $name = cleandata($_POST['fullname']);
        }
        if(empty($_POST['email'])) {
            $emailError = "email is requied";
        }else {
            $email = cleandata($_POST['email']);
        }
        $website = cleandata($_POST['website']);
        $comment = cleandata($_POST['comment']);
        if(empty($_POST['gender'])) {
            $genderError = "select gender";
        }else {
            $gender = cleandata($_POST['gender']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <h1>PHP Form Validation Example</h1>
    <form action="<?php echo cleandata($_SERVER['PHP_SELF']); ?>" method="post">
        <label class="red">* required field</label>
        <br><br>
        <label for="fullname"><b>Name:</b></label>
        <input type="text" name="fullname" id="fullname" value="<?php echo $name; ?>">
        <span class="red">* <?php echo $nameError; ?></span>
        <br><br>
        <label for="email"><b>e-Mail:</b></label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <span class="red">* <?php echo $emailError; ?></span>
        <br><br>
        <label for="website"><b>Website(URL):</b></label>
        <input type="text" name="website" id="website" value="<?php echo $website; ?>">
        <br><br>
        <label for="comment"><b>Comment:</b></label>
        <textarea name="comment" id="comment" cols="30" rows="10">
            <?php echo trim($comment); ?>
        </textarea>
        <br><br>
        <label><b>Gender:</b></label>
        <input type="radio" name="gender" id="female" value="F" <?php if($gender == 'F'){echo 'checked';} ?>>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="male" value="M" <?php if($gender == 'M'){echo 'checked';} ?>>
        <label for="female">Male</label>
        <input type="radio" name="gender" id="other" value="O" <?php if($gender == 'O'){echo 'checked';} ?>>
        <label for="female">Other</label>
        <span class="red">* <?php echo $genderError; ?></span>
        <br><br>
        <input type="submit" value="Save" name="submitBtn" id="submitBtn">
    </form>    
    <h2>Your Input:</h2>
    <?php

        if($name != "" && $email != "" && $website != "" && $comment != "" && $gender != ""){
            echo "
                <ul>
                    <li><b>Name : </b> $name</li>
                    <li><b>e-Mail : </b> $email</li>
                    <li><b>Website : </b> $website</li>
                    <li><b>Comment : </b> $comment</li>
                    <li><b>Gender : </b> $gender</li>
                </ul>
            ";
            echo '<h3 style="color:green;">Information Saved Successfully</h3>';            
        }else {
            echo '<h3 class="red">* Missing information!</h3>';
        }

    ?>
</body>
</html>