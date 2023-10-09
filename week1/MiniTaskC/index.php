<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task C</title>
    <style>
        header {
            background: #e3e3e3;
            padding: 2em;
            text-align: center;
        }
    </style>
</head>
<body>

<?php

$animals = [
    'Cat',
    'Dog',
    'Cow'
];

foreach ($animals as $animal) : ?>
    <li><?= $animal; ?></li>
<?php endforeach; ?>

</body>
</html>