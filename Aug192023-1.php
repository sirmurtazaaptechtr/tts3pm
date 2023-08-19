<?php
// PHP Conditional Statements
$num = 11;
$rem = $num % 2;
if($rem === 0){
    echo "<p>$num is Even.</p>";
}else{
    echo "<p>$num is Odd.</p>";
}

$obtainedmarks = 9;
$maxmarks = 20;
$percentage = $obtainedmarks/$maxmarks*100;
if($percentage >= 80.0){
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : A*</p>";
}elseif($percentage >= 70.0){
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : A</p>";
}elseif($percentage >= 60.0){
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : B</p>";
}elseif($percentage >= 50.0){
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : C</p>";
}elseif($percentage >= 40.0){
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : D</p>";
}else{
    echo "<p>Marks : $obtainedmarks/$maxmarks  <br />Percentage : $percentage% <br />Grade : F</p>";
}

$num1 = 10;
$num2 = 5;
$op = '/';
switch($op){
    case '+':
        $res = $num1 + $num2;
        echo "<p> $num1 + $num2 = $res</p>";
    break;
    case '-':
        $res = $num1 - $num2;
        echo "<p> $num1 - $num2 = $res</p>";
    break;
    case '*':
        $res = $num1 * $num2;
        echo "<p> $num1 X $num2 = $res</p>";
    break;
    case '/':
        $res = $num1 / $num2;
        echo "<p> $num1 / $num2 = $res</p>";
    break;
    default:
        echo "<p>The operator you selected is either Invalid or not supported</p>";
    break;
}
?>