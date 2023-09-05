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
// Indexed arrays - Arrays with a numeric index
    $students = array("Yusra Khan","Khadija Imran","Mohib Amin","Arbaz Hussain","Muhammad Huzaifa Khan","Faraz Abbas","Kashan Kamran","Muhammad Zeeshan","Hamza Irfan","Clayton Francis","Anshara Rizwan");
// OR
    $students = ["Yusra Khan","Khadija Imran","Mohib Amin","Arbaz Hussain","Muhammad Huzaifa Khan","Faraz Abbas","Kashan Kamran","Muhammad Zeeshan","Hamza Irfan","Clayton Francis","Anshara Rizwan"];

    // pr($students);
    // vd($students);

// Multidimensional arrays - Arrays containing one or more arrays
    $students = array(["Yusra Khan","19-Nov-2005","khanyusra550@gmail.com"],["Khadija Imran","19-Aug-2006","khadijaimran399@gmail.com","female"],["Mohib Amin","19-Dec-2004"],["Arbaz Hussain","31-Aug-2005"],["Muhammad Huzaifa Khan","4-Sep-2005"],["Faraz Abbas","13-Dec-2004"],["Kashan Kamran","05-Aug-2003"],["Muhammad Zeeshan","1-Sep-2005"],["Hamza Irfan","7-May-2003"],["Clayton Francis","26-Jul-2004"],["Anshara Rizwan","03-Nov-2004"]);
    
    // pr($students);
    // foreach($students as $student){
    //     echo "<p>";
    //     foreach($student as $index=>$info) {
    //         if(empty($info)) {
    //             continue;
    //         }
    //         if($index == 0) {
    //             echo "<b>Name : </b>";
    //         }elseif($index == 1) {
    //             echo "<b>Date of Birth : </b>";
    //         }elseif($index == 2) {
    //             echo "<b>email Address : </b>";
    //         }else {
    //             echo "<b>Gender : </b>";
    //         }
    //         echo $info . "<br />";
    //     }
    //     echo "</p>";
    // }

// Associative arrays - Arrays with named keys
    $cars = ["Huzaifa"=>"Honda Civic","Arbaz"=>"Suzuki Cultus","Kashan Kamran"=>"Toyota Carolla"];

    // pr($cars);
    // echo "<p>Huzaifa has " . $cars['Huzaifa'] . "</p>";
    
    foreach($cars as $owner=>$car){
        echo "<p>$owner has " . $car . "</p>";
    }

    $len1 = count($students);
    $len2 = count($cars);

    echo "<p>$len1,$len2</p>";

    $students = array(
        ["Name"=>"Yusra Khan","DOB"=>"19-Nov-2005","email"=>"khanyusra550@gmail.com"],
        ["Name"=>"Khadija Imran","DOB"=>"19-Aug-2006","email"=>"khadijaimran399@gmail.com","Gender"=>"female"],["Name"=>"Mohib Amin","DOB"=>"19-Dec-2004"],
        ["Name"=>"Arbaz Hussain","DOB"=>"31-Aug-2005"],
        ["Name"=>"Muhammad Huzaifa Khan","DOB"=>"4-Sep-2005"],
        ["Name"=>"Faraz Abbas","DOB"=>"13-Dec-2004"],
        ["Name"=>"Kashan Kamran","DOB"=>"05-Aug-2003"],
        ["Name"=>"Muhammad Zeeshan","DOB"=>"1-Sep-2005"],
        ["Name"=>"Hamza Irfan","DOB"=>"7-May-2003"],
        ["Name"=>"Clayton Francis","DOB"=>"26-Jul-2004"],
        ["Name"=>"Anshara Rizwan","DOB"=>"03-Nov-2004"]
    );
    pr($students);

    foreach($students as $student) {
        echo "<p>";
        foreach($student as $key=>$value) {
            echo "<b>$key : </b>$value<br />";
        }
        echo "</p>";
    } 