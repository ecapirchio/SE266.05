<?php
function fizzBuzz($num) {
    if ($num % 2 == 0 && $num % 3 == 0) {
        return 'Fizz Buzz';
    } elseif ($num % 2 == 0) {
        return 'Fizz';
    } elseif ($num % 3 == 0) {
        return 'Buzz';
    } else {
        return $num;
    }
}

for ($i = 1; $i <= 100; $i++) {
    echo fizzBuzz($i) . ' ';
}
?>