<?php

    include (__DIR__ . '/model_superheroes.php');

    $error = 0; #setting variables
    $errormsg = "";
    $now = new DateTime;
    if (isset($_POST['submitBtn'])){ #if statement to check if areas are set correctly

        $superhero_name = filter_input(INPUT_POST,'superhero_name');
        $secret_identity = filter_input(INPUT_POST,'secret_identity');
        $universe = filter_input(INPUT_POST,'universe');
        $main_power = filter_input(INPUT_POST,'main_power');

        if ($error !=0){ #if there are errors it will display all errors
            echo $errormsg;
        }
        if ($error == 0){   #Final output if no errors
            header("Location: viewSuperheroes.php");
        }
        if(isset($_POST['submitBtn']) && ($error == 0)){
            addSuperhero($superhero_name, $secret_identity, $universe, $main_power);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhero Intake Form</title>
    <h1>Superhero Intake Form</h1>
    <form method="post" action="superheroForm.php">
</head>
<body>
    <form method="post"> <!-- All inputs for patient -->
        <label for="superhero_name">Superhero Name:</label>
        <input type="text" name="superhero_name" required >
        <br><br>
        <label for="secret_identity">Secret Identity:</label>
        <input type="text" name="secret_identity" required>
        <br><br>
        <label for="universe">Universe:</label>
        <input type="text" name="universe" required>
        <br><br>
        <label for="main_power">Main Power:</label>
        <input type="text" name="main_power" required>
        <br><br>
        <input type="submit" name="submitBtn"/> <!-- Submit Button -->
        </form>
        <?php
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "<br>File last updated $mod_date";
        ?>
<br><br>
<a href="viewSuperheroes.php">View Superheroes</a>
</body>
</html>