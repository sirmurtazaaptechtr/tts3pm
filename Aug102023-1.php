<?php 
    echo("<h2>This is echo </h2>");
    print("<h2>This is print </h2>");

    /*$echoData = */echo "<h2>This is echo </h2>";
    $printData = print "<h2>This is print </h2>";

    echo $printData;

    $var1 = 4;
    $var2 = 2.5;
    echo "</p>";
    echo $var1,$var2;
    echo "</p>";

    echo "</p>";
    print $var1/*,$var2*/;
    echo "</p>";
    echo "</p>";
    print "$var1,$var2";
    echo "</p>";
    
    ECHO "<P>".PHP_INT_MAX."</P>";
    ECHO "<P>".PHP_INT_MIN."</P>";
    ECHO "<P>".PHP_INT_SIZE."</P>";

    echo "<p>";
    var_dump(is_int($var1));//true because $var1 = 4;
    echo "</p>";
    
    echo "<p>";
    var_dump(is_int($var2));#false because $var2 = 2.5;
    echo "</p>";

    echo "<p>";
    var_dump(is_int($var1*$var2));//false because int operates with float result in float;
    echo "</p>";
    
    ECHO "<P>".PHP_FLOAT_MAX."</P>";
    ECHO "<P>".PHP_FLOAT_MIN."</P>";
    ECHO "<P>".PHP_FLOAT_DIG."</P>";
    
    echo "<p>";
    var_dump(is_float($var1));//false because $var1 = 4;
    echo "</p>";
    
    echo "<p>";
    var_dump(is_float($var2));#true because $var2 = 2.5;
    echo "</p>";

    echo "<p>";
    var_dump(is_float($var1*$var2));//true because int operates with float result in float;
    echo "</p>";

    $var3 = 1.09876543211234567890e211;
    $var3 = 1.7e401;

    echo "<p>";
    var_dump($var3);
    echo "</p>";

    echo "<p>";
    var_dump(is_infinite($var3));
    echo "</p>";

    $var4 = acos(8);

    echo "<p>";
    var_dump($var4);
    echo "</p>";
 
    echo "<p>";
    var_dump(is_nan($var4));
    echo "</p>";
//Explicit casting (forcefully convert one data type to another datatype)
    // Cast float to int
    $x = 23465.768;
    $int_cast = (int)$x;
    echo $int_cast;

    echo "<br>";

    // Cast string to int
    $x = "23465.768";
    $int_cast = (int)$x;
    echo $int_cast;
    
    ?>