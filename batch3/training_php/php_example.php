<?php
    //echo output
    $message = "Hello, World";
    echo $message;

    //variabale types
    $string = "Hello, PHP";
    $number = 10;
    $decimal = 10.5;
    $boolean = false;

    echo $string."<br>";
    echo $number."<br>";
    echo $decimal."<br>";
    echo $boolean."<br>";

    echo "<br>";

    //string concatenation
    $name = 'Joshua';
    $email = 'deleonjoshy@gmail.com';

    echo "My name is: ".$name.". Reach me at: ".$email."<br>";

    echo "<br>";

    //arithmatic operation
    $a = 10;
    $b = 5;

    echo "Sum: ".($a+$b)."<br>";
    echo "Difference: ".($a-$b)."<br>";
    echo "Multiply: ".($a*$b)."<br>";
    echo "Divide: ".($a/$b)."<br>";

    echo "<br>";

    //Arrays
    $fruits = array("Apple", "Oranges", "Coconut");

    echo $fruits[0]."<br>";
    echo $fruits[1]."<br>";
    echo $fruits[2]."<br>"; 

    echo "<br>";

    //Associated Array
    $ages = array("Allice" =>25, "Bob"=>40);

    echo "Age of Allice is: ".$ages["Allice"]." years. <br>";
    echo "Age of Bob is: ".$ages["Bob"]." years. <br>";

    echo "<br>";

    //Conditional Statements
    $number = -1;

    if ($number>0) {
        echo "This is a positive number";
    } elseif ($number<0) {
        echo "The number is negative";
    } else {
        echo "The number is zero";
    }

    echo "<br><br>";

    //Loop
    for ($i=0; $i<=5; $i++) {
        echo "Iteration: ".$i."<br>";
    }

    echo "<br>";

    $j = 1;
    while ($j<5) {
        echo "New Iteration: ".$j. "<br>";
        $j++;
    }

    echo "<br>";

    //Function
    function greet($name) {
        return "Hello ".$name."<br>";
    }
    
    echo greet("Joshua");

    echo "<br>";

    //using for each loop
    $fruits = array("Apple", "Oranges", "Coconut", "Banana", "Mango");
    
    foreach ($fruits as $fruit){
        echo $fruit."<br>";
    }

?>