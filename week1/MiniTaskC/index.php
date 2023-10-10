<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task C</title>
    <style>
        /*CSS style for the header element*/
        header {
            background: #e3e3e3; /*Background color*/
            padding: 2em; /*Padding around the header content*/
            text-align: center; /*Center-align the text*/
        }
    </style>
</head>
<body>

<?php
//Create $animals array
$animals = [
    'Cat',
    'Dog',
    'Cow',
    'Horse',
    'Goat'
];

//Start a PHP foreach loop to iterate through the $animals array
foreach ($animals as $animal) : ?>
    <!--Start of HTML list item for each animal-->
    <li><?= $animal; ?></li>
    <!--End of HTML list item-->
<?php endforeach; //End of the foreach loop ?>

</body>
</html>