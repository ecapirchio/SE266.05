<!DOCTYPE html>
<html>
<head>
    <title>Patient Intake Form</title>
</head>
<body>
    <h2>Patient Intake Form</h2>
    <form method="post" action="processForm.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>
        
        <label for="married">Married (yes/no):</label>
        <select name="married" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br><br>
        
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    $file = basename($_SERVER['PHP_SELF']);
    $mod_date=date("F d Y h:i:s A", filemtime($file));
    echo "<br>File last updated $mod_date";
    ?>

</body>
</html>