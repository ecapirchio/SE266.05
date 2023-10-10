<?php

//Define a function 'fizzBuzz' that takes a number as input
function fizzBuzz($num) {
    //Check if the number is divisible by both 2 and 3
    if ($num % 2 == 0 && $num % 3 == 0) {
        return 'Fizz Buzz'; // If divisible by both, return 'Fizz Buzz'
    }
    //Check if the number is divisible by 2 only
    elseif ($num % 2 == 0) {
        return 'Fizz'; //If divisible by 2, return 'Fizz'
    }
    //Check if the number is divisible by 3 only
    elseif ($num % 3 == 0) {
        return 'Buzz'; //If divisible by 3, return 'Buzz'
    } else {
        return $num; //If not divisible by either, return the number itself
    }
}

//Use a 'for' loop to iterate through numbers from 1 to 100
for ($i = 1; $i <= 100; $i++) {
    //Call the 'fizzBuzz' function for each number and display the result
    echo fizzBuzz($i) . " ";
}

?>