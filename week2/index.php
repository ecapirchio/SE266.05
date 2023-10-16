<!DOCTYPE html>
<html>
<head>
    <title>Patient Intake Form</title>
</head>
<body>
    <h2>Patient Intake Form</h2>
    <form method="post" action="process_form.php">
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
        
        <label for="height">Height (in ft/in):</label>
        <input type="number" name="height" required><br><br>
        
        <label for="weight">Weight (in lbs):</label>
        <input type="number" name="weight" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>
