<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Your database connection details (replace with your actual credentials)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle search query
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Construct the SQL query based on the search term
$sql = "SELECT * FROM patients WHERE 
        first_name LIKE '%$searchTerm%' OR 
        last_name LIKE '%$searchTerm%' OR 
        marital_status LIKE '%$searchTerm%'";

$result = $conn->query($sql);

// HTML and search form
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <!-- Search form -->
    <form method="get" action="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <input type="submit" value="Search">
    </form>

    <!-- Display search results -->
    <h3>Search Results:</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Marital Status</th>
            <!-- Add more columns as needed -->
        </tr>

        <?php
        // Display search results
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['marital_status'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>

    <br>
    <a href="logoff.php">Log Off</a>
    <a href="viewPatients.php">Previous Patient Listing</a>
</body>
</html>