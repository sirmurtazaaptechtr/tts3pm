<?php
    // Start the session
    session_start();
    $id = "hussain123";
    $pwd = "abc123";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
</head>
<body>
    <?php
        // Set session variables
        $_SESSION['username'] = $id;
        $_SESSION['password'] = $pwd;
        echo "Session variables are set.";
    ?>
    <h3><a href="demo_session2.php">Page 2</a></h3>
    <h3><a href="logout.php">Logout</a></h3>
</body>
</html>