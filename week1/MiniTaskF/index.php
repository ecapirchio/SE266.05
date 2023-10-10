<?php

//Define a function 'dd' for debugging and displaying data
function dd($data) {
    echo '<pre>'; //Start a preformatted HTML block for better readability
    die(var_dump($data)); //Dump and display the data, then terminate the script
    echo '</pre>'; //End the preformatted block (Note: This line won't be reached)
}

$task = [
    'title' => 'Finish homework', //Task title
    'due'   => 'today', //Due date
    'assigned_to' => 'Jeffrey', //Person assigned to the task
    'completed' => false //Task completion status
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task F</title>
</head>
<body>

<h1>Task For The Day</h1>

<ul>
    <!--Display the task title-->
    <li>
        <strong>Name: </strong> <?= $task['title']; ?>
    </li>

    <!--Display the due date for the task-->
    <li>
        <strong>Due Date: </strong> <?= $task['due']; ?>
    </li>

    <!--Display the person responsible for the task-->
    <li>
        <strong>Person Responsible: </strong> <?= $task['assigned_to']; ?>
    </li>

    <li>
        <strong>Status: </strong>

        <!--Check if the task is completed and display an appropriate icon or text-->
        <?php if ($task['completed']) : ?>
            <span class="icon">&#9989;</span> <!--Display a checkmark icon if completed-->
        <?php else : ?>
            <span class="icon">Incomplete</span> <!--Display 'Incomplete' if not completed-->
        <?php endif; ?>
    </li>
</ul>

</body>
</html>