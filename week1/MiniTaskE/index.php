<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task E</title>
</head>
<body>

<?php

$task = [
    'title' => 'Finish homework',
    'due'   => 'today',
    'assigned_to' => 'Jeffrey',
    'completed' => false
];

?>

<h1>Task For The Day</h1>

<ul>
    <li>
        <strong>Name: </strong> <?= $task['title']; ?>
    </li>

    <li>
        <strong>Due Date: </strong> <?= $task['due']; ?>