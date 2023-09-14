
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="chat.php">GO TO CHAT</a></h1>
    <?php
        // readfile('webdictionary.txt'); //reads complete file

        $file = fopen('webdictionary.txt','r');
        // echo fread($file,filesize('webdictionary.txt')); //reads complete file
        echo '<ul>';
        while(!feof($file)){
            echo '<li>' . fgets($file) . '</li>'; //reads line by line
        }
        echo '</ul>';
        fclose($file);

        $file2 = fopen('abc.txt',"w");
        $txt = "My name is Hussain.";
        fwrite($file2,$txt);
        fclose($file2);

        readfile('abc.txt');
    ?>
    
</body>
</html>