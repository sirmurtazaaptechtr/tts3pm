<?php
    $file = $chat = $message = '';
    //save chat
    if(isset($_POST['submitBtn'])) {
        global $message,$file;
        $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
        $file = fopen("mychat2.txt","a") or die("Unable to open file!");
        fwrite($file,"<p>".$message."</p>\n");
        fclose($file);
    }
    //read chat
    $file = fopen('mychat2.txt',"r") or die("Unable to open file!");    
    $chat = filesize("mychat2.txt") > 0 ? fread($file,filesize("mychat2.txt")) : '';
    fclose($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: cursive;
            box-sizing: border-box;            
        }
        p {
            margin: 4px 0px;
        }
        #chatBox {
            overflow: scroll;
            border: 1px solid red;
            width: 400px;
            height: 300px;
            padding: 6px;
            margin-bottom: 16px;
        }
        input {
            border-radius: 16px;
        }
        input[type="text"] {
            border: 1px solid red;
            padding: 6px;
            width: 350px;
        }
        input[type="submit"] {
            border: 1px solid red;
            padding: 4px;
            width: 50px;
        }
    </style>
</head>
<body>
    <h1>Welcome to my Chat</h1>
    <div id="chatBox">
        <?php echo $chat?>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <input type="text" name="message" id="message" placeholder="type here to chat...">
        <input type="submit" value="Send" name="submitBtn" id="submitBtn">
    </form>    

</body>
</html>