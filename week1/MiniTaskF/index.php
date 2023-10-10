<?php

//Define a function 'dd' for debugging and displaying data
function dd($data) {
    echo '<pre>'; //Start a preformatted HTML block for better readability
    die(var_dump($data)); //Dump and display the data, then terminate the script
    echo '</pre>'; //End the preformatted block (Note: This line won't be reached)
}

//Create $animals array
$animals = [
    'dog',
    'cat',
    'cow'
    
];

dd($animals);

?>