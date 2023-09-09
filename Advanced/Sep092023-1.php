<?php
    date_default_timezone_set("Asia/Karachi");

    // date(format,timestamp) format:Required. Specifies the format of the timestamp. timestamp:Optional. Specifies a timestamp. Default is the current date and time

    $dt = date("d/m/Y");
    echo "<p> $dt </p>";

    $dt = date("j-M-Y");
    echo "<p> $dt </p>";

    $dt = date("l, j F Y");
    echo "<p> $dt </p>";

    $dt = date("l, j F Y H:i:s");
    echo "<p> $dt </p>";

    $dt = date("l, j F Y h:i:sa");
    echo "<p> $dt </p>";   

    // mktime(hour, minute, second, month, day, year) function returns the Unix timestamp for a date.

    $dob_Yusra = mktime(16,45,30,11,19,2005);
    $dt =  date("l, j F Y h:i:sa",$dob_Yusra);
    echo "<p> $dt </p>";
    $dt =  date("l, j F Y H:i:s",$dob_Yusra);
    echo "<p> $dt </p>";
    
    // strtotime(time, now) function is used to convert a human readable date string into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).

    $thedate = strtotime("Yesterday");
    $dt =  date("l, j F Y h:i:sa",$thedate);
    echo "<p> $dt </p>";

    $thedate = strtotime("Today");
    $dt =  date("l, j F Y h:i:sa",$thedate);
    echo "<p> $dt </p>";

    $thedate = strtotime("Tomorrow");
    $dt =  date("l, j F Y h:i:sa",$thedate);
    echo "<p> $dt </p>";

    $thedate = strtotime("19-Nov-2005");
    $dt =  date("l, j F Y h:i:sa",$thedate);
    echo "<p> $dt </p>";
?>