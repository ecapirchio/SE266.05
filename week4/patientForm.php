<?php
// patientForm.php

include (__DIR__ . '/model_patients.php');

function age($birth_date) {
    $date = new DateTime($birth_date);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
}

$error = 0;
$errormsg = "";
$now = new DateTime;

if (isset($_POST['submitBtn'])) {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $married = isset($_POST['married']) ? 1 : 0; // Use 1 if checked, 0 if not
    $birth_date = filter_input(INPUT_POST, 'birth_date');

    if (age($birth_date) > 120) {
        $error += 1;
        $errormsg .= "Age cannot be more than 119\n";
    }
    if ($birth_date > $now->format('Y-m-d')) {
        $error += 1;
        $errormsg .= "Cannot enter a future date\n";
    }
    if ($error != 0) {
        echo $errormsg;
        exit; // Stop execution on error
    }

    $result = addPatient($first_name, $last_name, $married, $birth_date);
    
    if ($result === 'Data Added') {
        header("Location: viewPatients1.php");
        exit;
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
</head>
<body>
    <form action="patientForm.php" method="post">
        <!-- All inputs for the patient -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married">
        <br><br>
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required>
        <br><br>
        <input type="submit" name="submitBtn"/> <!-- Submit Button -->
    </form>
    <br><br>
    <a href="viewPatients1.php">View Patients</a>
</body>
</html>
?>