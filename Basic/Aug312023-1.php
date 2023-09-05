<?php
    function pr ($input) {
        echo "<pre>";
        print_r($input);
        echo "</pre>";
    }
    function vd ($input) {
        echo "<pre>";
        var_dump($input);
        echo "</pre>";
    }

    $students = ["Yusra Khan","Khadija Imran","Mohib Amin","Arbaz Hussain","Muhammad Huzaifa Khan","Faraz Abbas","Kashan Kamran","Muhammad Zeeshan","Hamza Irfan","Clayton Francis","Anshara Rizwan"];
    // pr($students);

    // sort($students);
    // pr($students);

    // rsort($students);
    // pr($students);

    $cars = ["Huzaifa"=>"Honda Civic","Arbaz"=>"Suzuki Cultus","Kashan Kamran"=>"Toyota Carolla","Clayton"=>"Suzuki Aulto"];
    // pr($cars);
    
    // asort($cars);
    // pr($cars);
    
    // arsort($cars);
    // pr($cars);
    
    // ksort($cars);
    // pr($cars);

    // krsort($cars);
    // pr($cars);
    
// PHP Superglobal - $GLOBALS

    $x = 75;
    $y = 25;    
    // pr($GLOBALS);    
    
    function addition() {
        $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    }    
    addition();

    // pr($GLOBALS);
    echo $z;

//PHP Superglobal - $_SERVER
    // pr($_SERVER);

// PHP Superglobal - $_REQUEST

?>
    <form action="" method="post">
        <input type="text" placeholder="Enter Full Name" name="name" id="username">
        <input type="submit" value="submit" name="submitBtn">
    </form>
<?php

    pr($_REQUEST);