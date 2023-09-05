<?php
    declare(strict_types=1); // strict requirement
// All Functions
    function greetings()  {
        echo "<p>Hello, How are you?</p>";
    }
    function greetingsv1($name)  {
        echo "<p>Hello $name, How are you?</p>";
    }
    function greetingsv2($name)  {
        echo "Hello $name, How are you?";
        $note = "I've greeted $name.";
        return $note;
    }
    function greetingsv3($sender,$recipent)  {
        echo "Hello $recipent, How are you?";
        $note = "$sender has greeted $recipent.";
        return $note;
    }
    function sum($values = []){
        $total = 0;
        foreach($values as $value){
            $total = $total + $value;
        }
        return $total;
    }
    function sum2nums(int $num1, int $num2) {
        $total = $num1 + $num2;
        return $total;       
    }

    greetings();# call of the function
    
    greetingsv1("Ayesha");
    greetingsv1("Mohib");
    greetingsv1("Khadija");
    greetingsv1("Faraz");   

    echo "<p>";
    $msg = greetingsv2("Kashan");
    echo "</p>";
    echo "<p>";    
    echo "$msg";
    echo "</p>";

    echo "<p>";
    $msg = greetingsv2("Hamza");
    echo "</p>";
    echo "<p>";    
    echo "$msg";
    echo "</p>";
    
    echo "<p>";
    $msg = greetingsv3("Murtaza","Yusra");
    echo "</p>";
    echo "<p>";    
    echo "$msg";
    echo "</p>";

    echo sum([1,9]) . "<br />";
    echo sum2nums(12,14) . "<br />";