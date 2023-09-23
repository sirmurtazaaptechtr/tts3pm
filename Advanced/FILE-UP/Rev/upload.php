<?php
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $target_file_dir = "uploads/";
    $target_file_name = basename($_FILES['fileToUpload']['name']);
    $target_file = $target_file_dir . $target_file_name;

    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file)) {
        echo "<p>$target_file_name has been uploaded successfully!</p>";
    }else {
        echo "<p>Upload Failed!</p>";
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
        <h4><a href="index.php">BACK TO UPLOAD FILE</a></h4>
    </body>
    </html>