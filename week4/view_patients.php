<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>
</head>
<body>
    <h1>View Patients</h1>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Marital Status</th>
            <th>Birth Date</th>
            <th>Height (ft)</th>
            <th>Weight (lbs)</th>
            <th>Age</th>
            <th>BMI</th>
            <th>BMI Classification</th>
        </tr>
        <!-- Loop through the list of patients and display their information here -->
        <?php
        // You should replace this with actual data retrieval from your database
        $patients = getPatientsFromDatabase(); // Implement this function to fetch patients data

        foreach ($patients as $patient) {
            echo "<tr>";
            echo "<td>{$patient['first_name']}</td>";
            echo "<td>{$patient['last_name']}</td>";
            echo "<td>{$patient['marital_status']}</td>";
            echo "<td>{$patient['birth_date']}</td>";
            echo "<td>{$patient['height']}</td>";
            echo "<td>{$patient['weight']}</td>";
            echo "<td>{$patient['age']}</td>";
            echo "<td>{$patient['bmi']}</td>";
            echo "<td>{$patient['bmi_classification']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="patient_details.php">Add Patient</a>
</body>
</html>