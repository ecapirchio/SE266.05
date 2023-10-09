<?php

function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

$task = [
    'title' => 'Finish homework',
    'due'   => 'today',
    'assigned_to' => 'Jeffrey',
    'completed' => false
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
    <li>
        <strong>Name: </strong> <?= $task['title']; ?>
    </li>

    <li>
        <strong>Due Date: </strong> <?= $task['due']; ?>
    </li>

    <li>
        <strong>Person Responsible: </strong> <?= $task['assigned_to']; ?>
    </li>

    <li>
        <strong>Status: </strong>

        <?php if ($task['completed']) : ?>
            <span class="icon">&#9989;</span>
        <?php else : ?>
            <span class="icon">Incomplete</span>
        <?php endif; ?>
    </li>
</ul>

</body>
</html>