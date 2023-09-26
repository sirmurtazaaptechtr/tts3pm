<?php
    $students = ['Yusra'=>17,'Ayesha'=>20,'Khadija'=>17,'Huzaifa'=>18,'Kashan'=>19,'Hamza'=>20,'Clayton'=>19,'Anshara'=>18,'Zeeshan'=>19];

    // $names = array_map(function($name){         
    //         return "$name - " . strlen($name);        
    // },array_keys($students));

    function name_length ($name) {
        return "$name - " . strlen($name);
    }

    $names = array_map('name_length',array_keys($students));

    echo "<pre>";
    print_r($names);
    echo "</pre>";
?>