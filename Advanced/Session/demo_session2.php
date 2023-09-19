<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <?php
        echo "<p>USERNAME : " . $_SESSION['username'] . "</p>";
        echo "<p>PASSWORD : " . $_SESSION['password'] . "</p>";
    ?>
    <h3><a href="index.php">Home</a></h3>
    <h3><a href="logout.php">Logout</a></h3>
    
</body>
</html>