<?php
// WHILE LOOP
    $num = 6;
    while($num <= 5){
        echo "<p>$num</p>";
        $num++;
    }
    echo "<p>Last Value of num = $num</p>";
// FOR LOOP
    for($num = 8;$num <= 7;$num++){
        echo "<p>$num</p>";
    }
    echo "<p>Last Value of num = $num</p>";
// DO WHILE LOOP
    $num = 6;
    do{
        echo "<p>$num</p>";
        $num++;
    }while($num <= 5);
    echo "<p>Last Value of num = $num</p>";

    $students = ["Yusra","Mohib","Arbaz","Huzaifa","Faraz","Kashan","Hamza",  "Clayton","Zeeshan","Murtaza"];
    // $index = 0;
    // $len = count($students);
    // do{
    //     echo "<p>Hi $students[$index]</p>";
    //     $index++;
    // }while($index < $len);
    
    // for($index=0;$index<count($students);$index++){
    //     echo "<p>Hello $students[$index]</p>";
    // }
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    foreach($students as $key=>$value){
        echo "<p>" . $key+1 . " Dear $value</p>";
    }
    // display table of 12
    $tab = 12;
    for($cnt=1;$cnt<=10;$cnt++){
        // echo "<p>$tab X $cnt = " . $cnt*$tab . "</p>";
        $mul = $cnt * $tab;
        echo "<p>$tab X $cnt = $mul</p>";
    }
    // Pattern printing
    for($cnt=1;$cnt<=5;$cnt++){
        switch($cnt){
            case 1:
                echo "<p>*</p>";
            break;
            case 2:
                echo "<p>**</p>";
            break;
            case 3:
                echo "<p>***</p>";
            break;
            case 4:
                echo "<p>****</p>";
            break;
            case 5:
                echo "<p>*****</p>";
            break;
        }        
    }
    for($cnt=5;$cnt>=1;$cnt--){
        switch($cnt){
            case 1:
                echo "<p>*</p>";
            break;
            case 2:
                echo "<p>**</p>";
            break;
            case 3:
                echo "<p>***</p>";
            break;
            case 4:
                echo "<p>****</p>";
            break;
            case 5:
                echo "<p>*****</p>";
            break;
        }        
    }
    // pattern printing via nested loops
    for($r=1;$r<=5;$r++){
        echo "<p>";
        for($c=$r;$c<=5;$c++)
        {
            echo " * ";
        }
        echo "</p>";
    }
    for($r=5;$r>=1;$r--){
        echo "<p>";
        for($c=$r;$c<=5;$c++)
        {
            echo " * ";
        }
        echo "</p>";
    }
    for($r=1;$r<=5;$r++){
        echo "<p>";
        for($c=5;$c>=$r;$c--)
        {
            echo " * ";
        }
        echo "</p>";
    }
    for($r=1;$r<=5;$r++){
        echo "<p>";
        for($c=1;$c<=$r;$c++)
        {
            echo " * ";
        }
        echo "</p>";
    }
    
    