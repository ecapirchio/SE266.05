<?php

//Create $task array
$task = [
    'title' => 'Finish homework', //Task title
    'due'   => 'today', //Due date
    'assigned_to' => 'Emma', //Person assigned to the task
    'completed' => true //Task completion status
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task E</title>
</head>
<body>

<ul>
    <!--Display the task title-->
    <li>
        <strong>Task: </strong> <?= $task['title']; ?>
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