<?php
    $fullName = "Ayesha Khan";
    echo "<h3>Full Name :  $fullName  </h3>";
    echo "<h3>Full Name : " . $fullName . " </h3>";
    echo '<h3>Full Name : ' . $fullName . ' </h3>';
    echo '<h3>Full Name : "' . $fullName . '" </h3>';
    
    $num1 = 15;
    $num2 = 5;    
    $res = $num1 + $num2;

    echo "<p>The Sum of $num1 and $num2 is $res</p>";

    $data = "Syed Murtaza Hussain";
    var_dump($data);
    echo "<br />";
    $data = 151;
    var_dump($data);
    echo "<br />";
    $data = 22.7;
    var_dump($data);
    echo "<br />";
    $data = true;
    var_dump($data);
    echo "<br />";

    $name = "Ali";
    echo $name."<br />";
    
    function f(){
        $name = "Jameel";
        echo $name."<br />";
    }
    f();
    echo $name."<br />";
