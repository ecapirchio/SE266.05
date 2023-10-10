<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task E</title>
</head>
<body>

<?php

//Define an array named $task with information about a task
$task = [
    'title' => 'Finish homework', //Task title
    'due'   => 'today', //Due date
    'assigned_to' => 'Jeffrey', //Person assigned to the task
    'completed' => false //Task completion status
];

?>

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