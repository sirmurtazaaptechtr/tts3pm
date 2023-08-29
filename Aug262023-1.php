<?php
    $x = 15;
    $y = 20;

    echo "<p>Outside (Before): $x,$y</p>";

    // function myfun($x,$y){
    //     echo "<p>Inside (Before): $x,$y</p>";        
    //     $x = 1;
    //     $y = 2;        
    //     echo "<p>Inside (After): $x,$y</p>";        
    // }
    function swap (&$x,&$y){
        echo "<p>Inside (Before): $x,$y</p>";
        $temp = $x;
        $x = $y;
        $y = $temp;
        echo "<p>Inside (After): $x,$y</p>";
    }

    swap($x,$y);

    // myfun($x,$y);
    
    echo "<p>Outside (After): $x,$y</p>";

    $x = 5; // global scope
    function myTest() {       
        // using x inside this function will generate an error
        echo "<p>Variable x inside function is: $x</p>";
    }
    myTest();
    echo "<p>Variable x outside function is: $x</p>";

    function myTest2() {
        $a = 5; // local scope
        echo "<p>Variable x inside function is: $a</p>";
    }
    myTest2();
      
    // using x outside the function will generate an error
    echo "<p>Variable x outside function is: $a</p>";

    $p = 15;
    $q = 20;
    echo "<p>$p,$q</p>";

    function MyTest3()  {
        // echo "<pre>";
        // print_r($GLOBALS);
        // echo "</pre>";


        $GLOBALS['p'] = $GLOBALS['p'] + $GLOBALS['q'];
        // global $p, $q;
        // $p = $p + $q;
    }
    MyTest3();

    echo "<p>$p,$q</p>";

    function abc (){
        static $num1 = 0;
        $num2 = 0;
        $num1++;
        $num2--;
        echo "<p>$num1,$num2</p>";
    }
    abc();
    abc();
    abc();
    abc();