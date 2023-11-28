<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection and patient model files
include(__DIR__ . '/db.php');
include(__DIR__ . '/model_patients.php');

// Handle search
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['searchButton'];
    
    // Query the database based on first name, last name, or marital status
    $patients = searchPatients($first_name, $last_name, $married);

} else {
    // Load all patients initially
    $patients = getPatients();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <!-- Search Form -->
    <form method="post" action="search.php">
        <label>First Name:</label>
        <input type="text" name="first_name" />

        <label>Last Name:</label>
        <input type="text" name="last_name" />

        <label for="married">Married (yes/no):</label>
        <select name="married" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <input type="submit" name="searchButton" value="Search" />
    </form>



    <!-- Display search results or all patients -->
    <h3>Patients</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Married</th>
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
    <a href="logoff.php">Log Off</a>
    <a href="viewPatients.php">Patient Listing</a>
</body>
</html>