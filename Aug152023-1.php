<?php
    $myname = "Syed Murtaza Hussain";
//PHP Constants
    define("MY_NAME","Syed Murtaza Hussain");
    echo "<p>" . MY_NAME . "</p>";

    define("MY_CARS", [
        "Honda",
        "Suzuki",
        "Alfa Romeo",
        "BMW",
        "Toyota"
    ]);
    echo MY_CARS[0];

//PHP Operators

//PHP Arithmetic Operators
    $num = 5;

    $res = $num + 10;
    echo "<p>$res</p>";
    
    $res = $num - 10;
    echo "<p>$res</p>";
    
    $res = $num * 10;
    echo "<p>$res</p>";
    
    $res = $num / 10;
    echo "<p>$res</p>";
    
    $res = $num % 10;
    echo "<p>$res</p>";
    
    $res = $num ** 10;
    echo "<p>$res</p>";
//PHP Assignment Operators      
    echo "<p>$num</p>";
    $num += 5; // $num = $num + 5;
    echo "<p>$num</p>";
    
    echo "<p>$num</p>";
    $num -= 5; // $num = $num + 5;
    echo "<p>$num</p>";
    
    echo "<p>$num</p>";
    $num *= 5; // $num = $num + 5;
    echo "<p>$num</p>";
    
    echo "<p>$num</p>";
    $num /= 5; // $num = $num + 5;
    echo "<p>$num</p>";
    
    echo "<p>$num</p>";
    $num %= 5; // $num = $num + 5;
    echo "<p>$num</p>";
    
    echo "<p>$num</p>";
    $num **= 5; // $num = $num + 5;
    echo "<p>$num</p>";
//PHP Comparison Operators
    $x = 10;
    $y = 5;
    
    $z = $x == $y;
    echo "<p>" . var_dump($z) . "</p>";
    
    $y = "10";
    $z = $x == $y;
    echo "<p>" . var_dump($z) . "</p>";

    $z = $x === $y;
    echo "<p>" . var_dump($z) . "</p>";

    $z = $x !== $y;
    echo "<p>" . var_dump($z) . "</p>";
    
    $y = 12;
    $z = $x < $y;
    echo "<p>" . var_dump($z) . "</p>";      
    
    $y = 12;
    $z = $x > $y;
    echo "<p>" . var_dump($z) . "</p>";      
    
    $y = 12;
    $z = $x <=> $y;
    echo "<p>" . var_dump($z) . "</p>";      
    
    $y = 10;
    $z = $x <=> $y;
    echo "<p>" . var_dump($z) . "</p>";      
    
    $y = 9;
    $z = $x <=> $y;
    echo "<p>" . var_dump($z) . "</p>";      
    //PHP Increment / Decrement Operators
    $x = 10;
    $res = 0;
    
    
    echo "<p>$x , $res </p>";      
    // $res =  $x++ * 5; // POST increment
    $res =  ++$x * 5; // PRE increment
    echo "<p>$x , $res </p>";    

?>