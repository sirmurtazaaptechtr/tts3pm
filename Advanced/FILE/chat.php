<?php
    $message = $chat = '';
    function showchat() {
        global $chat;
        $chat = '';
        $file = fopen('mychat.txt',"r");        
        while(!feof($file)){
            $chat .= fgets($file) ; //reads line by line            
        }        
        fclose($file);
    }

    showchat();

    if(isset($_POST['submitBtn'])) {
        $message = htmlspecialchars($_POST['message'])."\n";
        $file = fopen('mychat.txt',"a") or die("Unable to open file!");
        fwrite($file,$message);
        fclose($file);
        showchat();        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Self Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
</head>

<body>    
    <div class="container">
        <h1>Welcome to My Chat</h1>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3 row g-3">
                <label for="chatArea" class="visually-hidden">Chat Area</label>
                <textarea class="form-control w-50" id="chatArea" name="chatArea" rows="10"><?php echo $chat; ?></textarea>
            </div>
            <div class="row g-3">
                <div class="col-5">
                    <label for="message" class="visually-hidden">Message</label>
                    <input type="text" class="form-control" id="message" name="message" placeholder="type message here.">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary mb-3" value="SEND" name="submitBtn" id="submitBtn">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>