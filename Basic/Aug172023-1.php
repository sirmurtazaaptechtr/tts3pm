<?php
//PHP Logical Operators 
    $a = true;$b = true;
    echo "<p>true AND true = ";
    var_dump($a && $b);
    echo "</p>";
    $a = true;$b = false;  
    echo "<p>true AND false = ";
    var_dump($a && $b);
    $a = false;$b = false;  
    echo "<p>false AND false = ";
    var_dump($a && $b);
    $a = true;$b = true;
    echo "<p>true OR true = ";
    var_dump($a || $b);
    echo "</p>";
    $a = true;$b = false;  
    echo "<p>true OR false = ";
    var_dump($a || $b);
    $a = false;$b = false;  
    echo "<p>false OR false = ";
    var_dump($a || $b);
    echo "</p>";
    $a = false;$b = false;  
    echo "<p>false XOR false = ";
    var_dump($a xor $b);
    $a = false;$b = true;  
    echo "<p>false XOR true = ";
    var_dump($a xor $b);
    echo "</p>";
    $a = true;$b = true;  
    echo "<p>true XOR true = ";
    var_dump($a xor $b);
    echo "</p>";    
//PHP String Operators
    $text1 = "Hi";
    $text2 = "There";
    echo $text1.' '.$text2."<br/>";
    echo $text1."<br/>";
    echo $text2."<br/>";

    $text1.=' '; // $text1 = $text1 . ' ';
    $text1.=$text2; // $text1 = $text1 . $text2;
    echo $text1."<br/>";
    echo $text2."<br/>";
// PHP Conditional Assignment Operators
    $num = 11;
    // if($num % 2 === 0){
    //     echo "<p>$num is Even.</p>";
    // }else{
    //     echo "<p>$num is Odd.</p>";
    // }
    $res = $num % 2 === 0?"<p>$num is Even.</p>":"<p>$num is Odd.</p>";
    echo $res;

    $data4mDB = "03-July-1983";
    $data4mDB = null;
    $data = $data4mDB??"1/1/2000";
    echo "<p>Your DOB is ".  date("l, d F Y",strtotime($data))."</p>";