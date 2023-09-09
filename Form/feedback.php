<?php
    // Initialize variables
    $name = $email = $website = $comment = $gender = "";
    $nameError = $emailError = $websiteError = $commentError = $genderError = "";    
    
    // Sanitizing Input
    function cleandata($input) {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if(isset($_POST['submitBtn'])) {
        // Validate and process the form data
        if(empty($_POST['fullname'])) {
            $nameError = "name is required";
        }
        else {
            $name = cleandata($_POST['fullname']);
            // check if name only contains letters and whitespace
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameError = "Only Alphabets and White Spaces are allowed";                
            }
        }
        if(empty($_POST['email'])) {
            $emailError = "email is requied";
        }else {
            $email = cleandata($_POST['email']);
            // check if e-mail address is well-formed            
            if(!preg_match("/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/",$email)) {
                $emailError = "Invalid Email!";
            }
        }
        if(empty($_POST['website'])) {
            $website = "";
        }else {
            $website = cleandata($_POST['website']);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteError = "Invalid URL!";
            }
        }
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label class="red">* required field</label>
        <br><br>
        <label for="fullname"><b>Name:</b></label>
        <input type="text" name="fullname" id="fullname" value="<?php echo htmlspecialchars($name); ?>">
        <span class="red">* <?php echo $nameError; ?></span>
        <br><br>
        <label for="email"><b>e-Mail:</b></label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="red">* <?php echo $emailError; ?></span>
        <br><br>
        <label for="website"><b>Website(URL):</b></label>
        <input type="text" name="website" id="website" value="<?php echo htmlspecialchars($website); ?>">
        <span class="red"> <?php echo $websiteError; ?></span>
        <br><br>
        <label for="comment"><b>Comment:</b></label>
        <textarea name="comment" id="comment" cols="30" rows="10"><?php echo htmlspecialchars($comment); ?></textarea>
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
        if(isset($_POST['submitBtn'])) {
            if($nameError == "" && $emailError == "" && $websiteError == "" && $genderError == ""){
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
                echo '<h3 class="red">* Missing/Incorrect information!</h3>';
            }
        }

    ?>
</body>
</html>