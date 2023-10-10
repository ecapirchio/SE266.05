<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task D</title>
</head>
<body>

<?php

//Define an array named $person with information about a person
$person = [
    'age' => 31,
    'hair' => 'brown',
    'career' => 'web developer'
];

//Add a 'name' key to the $person array and set it to 'Jeffrey'
$person['name'] = 'Jeffrey';

//Remove the 'age' key from the $person array
unset($person['age']);

//Start a PHP foreach loop to iterate through the $person array
foreach ($person as $key => $feature) : ?>
    <!--Start of HTML unordered list for each person's feature-->
    <ul>
        <!--List item displaying the feature key in bold and its value-->
        <li><strong><?= $key; ?></strong> <?= $feature; ?></li>
    </ul>
    <!--End of HTML unordered list-->
<?php endforeach; //End of the foreach loop ?>

</body>
</html>