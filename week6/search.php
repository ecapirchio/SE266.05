<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Your HTML and search functionality here
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <!-- Your search form and patient listing here -->

    <br>
    <a href="logoff.php">Log Off</a>
    <a href="viewPatients.php">Patient Listing</a>
</body>
</html>