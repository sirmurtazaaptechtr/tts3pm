<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Php Sample code -->
    <?php
        //echo function exampls
        echo "Hello World!";
        echo '<h1 class="text-bg-primary">This is php code</h1>';
        echo '<p class="text-center">This paragraph is generated by PHP</p>';

        #some variables
        $name = "Arbaaz Hussain";
        $age = 17;

        /*
        this is
        a Multiline 
        Comment
        */

        echo "<p>Dear $name, you are $age years old.</p>";
        echo '<p>Dear '.$name.', you are '.$age.' years old.</p>';
        echo '<p>Dear "' . $name . '", you are "' . $age . '" years old.</p>';
    ?>

    <script>
        console.log("this is JS");
    </script>
    
</body>
</html>
