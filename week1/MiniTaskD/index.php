<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task D</title>
</head>
<body>

<?php

$person = [
    'age' => 31,
    'hair' => 'brown',
    'career' => 'web developer'
];

$person['name'] = 'Jeffrey';

unset($person['age']);

foreach ($person as $key => $feature) : ?>
    <ul>
        <li><strong><?= $key; ?></strong> <?= $feature; ?></li>
    </ul>
<?php endforeach; ?>

</body>
</html>