<?php
    function divide($number,$divisor) {
        if($divisor === 0) {
            throw new Exception("Message : Division by zero");
        }else {
            return $number / $divisor;
        }
    }
    
    try {
        echo divide(15,0);        
    }
    catch (Exception $x) {
        echo "<p>".$x->getMessage()."</p>";
        echo "<p>".$x->getCode()."</p>";
        echo "<p>".$x->getLine()."</p>";
        echo "<pre>";
        print_r($x->getTrace());
        echo "</pre>";
        echo "<p>Divisor can't be zero</p>";
    }
    finally {
        echo "<p>This is finally block</p>";
    }
?>