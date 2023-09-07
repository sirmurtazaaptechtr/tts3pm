<?php
session_start();

// Initialize variables
$name = $email = $website = $comment = $gender = "";
$nameError = $emailError = $genderError = "";

function cleanData($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the form data
    if (empty($_POST['fullname'])) {
        $nameError = "Name is required";
    } else {
        $name = cleanData($_POST['fullname']);
    }

    if (empty($_POST['email'])) {
        $emailError = "Email is required";
    } else {
        $email = cleanData($_POST['email']);
    }

    $website = cleanData($_POST['website']);
    $comment = cleanData($_POST['comment']);

    if (empty($_POST['gender'])) {
        $genderError = "Select gender";
    } else {
        $gender = cleanData($_POST['gender']);
    }

    // If there are no errors, store the form data and redirect to a confirmation page
    if (empty($nameError) && empty($emailError) && empty($genderError)) {
        // Store the form data in a session
        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'website' => $website,
            'comment' => $comment,
            'gender' => $gender,
        ];

        // Redirect to a confirmation page
        header("Location: confirmation.php");
        exit;
    }
}

// Clear the form data session on initial load
unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
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
        <label for="email"><b>Email:</b></label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="red">* <?php echo $emailError; ?></span>
        <br><br>
        <label for="website"><b>Website (URL):</b></label>
        <input type="text" name="website" id="website" value="<?php echo htmlspecialchars($website); ?>">
        <br><br>
        <label for="comment"><b>Comment:</b></label>
        <textarea name="comment" id="comment" cols="30" rows="10"><?php echo htmlspecialchars($comment); ?></textarea>
        <br><br>
        <label><b>Gender:</b></label>
        <input type="radio" name="gender" id="female" value="F" <?php if ($gender === 'F') echo 'checked'; ?>>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="male" value="M" <?php if ($gender === 'M') echo 'checked'; ?>>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="other" value="O" <?php if ($gender === 'O') echo 'checked'; ?>>
        <label for="other">Other</label>
        <span class="red">* <?php echo $genderError; ?></span>
        <br><br>
        <input type="submit" value="Save" name="submitBtn" id="submitBtn">
    </form>
</body>
</html>
