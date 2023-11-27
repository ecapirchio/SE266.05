<?php
include (__DIR__ . '/addPatient.php');
$patients = getPatients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Week 4 Patients</title>
</head>

<body>
    <h1>Patient Details</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Marital Status</th>
            <th>Birth Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['first_name']; ?></td>
            <td><?php echo $p['last_name']; ?></td>
            <td><?php echo $p['married']; ?></td>
            <td><?php echo $p['birth_date']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="patientDetails.php">Add Patient</a>
</body>
</html>