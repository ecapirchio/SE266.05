<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task D</title>
</head>
<body>

    <?php

    $tasks = [
        'title:' => ' Finish homework', //Task title
        'due:'   => ' today', //Due date
        'assigned_to:' => ' Emma', //Person assigned to the task
        'completed:' => ' yes' //Task completion status
    ];

    //Start a PHP foreach loop to iterate through the $animals array
    foreach ($tasks as $task) : ?>
        <!--Start of HTML list item for each animal-->
        <li><?= $task; ?></li>
        <!--End of HTML list item-->
    <?php endforeach; //End of the foreach loop ?>
    <ul>
        <?php foreach ($tasks as $key => $feature) : ?>
            <li><strong><?= $key; ?></strong><?= $feature; ?></li>
        
        <?php endforeach; ?>
    </ul>

</body>
</html>