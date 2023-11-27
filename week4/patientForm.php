<?php

    include (__DIR__ . '/model_patients.php');

    function age($birth_date) { #function to convert the date of birth to an actual age 
        $date = new DateTime($birth_date);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    $error = 0; #setting variables
    $errormsg = "";
    $now = new DateTime;
    if (isset($_POST['submitBtn'])){ #if statement to check if areas are set correctly

        $first_name = filter_input(INPUT_POST,'first_name');
        $last_name = filter_input(INPUT_POST,'last_name');
        $married = filter_input(INPUT_POST,'married');
        if ($married == true){ 
            $married = 1;
        }
        if ($married == false){
            $married = 0;
        }
        $birth_date = filter_input(INPUT_POST,'birth_date'); #All validation for patient
        if (age($birth_date) > 120){
            $error += 1;
            $errormsg .= "Age cannot be more than 119\n";
        }
        if ($birth_date > $now){
            $error += 1;
            $errormsg .= "Cannot enter a future date\n";
        }
        if ($error !=0){ #if there are errors it will display all errors
            echo $errormsg;
        }
        if ($error == 0){   #Final output if no errors
            header("Location: viewPatients.php");
        }
        if(isset($_POST['submitBtn']) && ($error == 0)){
            addPatient($first_name, $last_name, $married, $birth_date);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Intake Form</title>
    <h1>Patient Intake Form</h1>
    <form method="post" action="patientForm.php">
</head>
<body>
    <form action="index.php" method="post"> <!-- All inputs for patient -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required >
        <br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married" >
        <br><br>
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required>
        <br><br>
        <input type="submit" name="submitBtn"/> <!-- Submit Button -->
        </form>
        <?php
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "<br>File last updated $mod_date";
        ?>
<br><br>
<a href="viewPatients.php">View Patients</a>
</body>
</html>