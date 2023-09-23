<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to File Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">        
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="uploadBtn" id="uploadBtn">
    </form>    
</body>
</html>