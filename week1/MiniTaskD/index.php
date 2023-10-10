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
    
    ?>
    
    <ul>
        <?php foreach ($tasks as $key => $feature) : ?>
            <li><strong><?= $key; ?></strong><?= $feature; ?></li>
        
        <?php endforeach; ?>
    </ul>

</body>
</html>