<?php
// Include the database connection and patient model files
include(__DIR__ . '/db.php');
include (__DIR__ . '/model_patients.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
else {
    // Load all patients initially
    $patients = getPatients();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $result = deletePatient($id);

        if ($result === 'Data Deleted') {
            header("Location: viewPatients.php");
            exit();
        }
    }
}

/*if(isset($_POST['deletePatient'])){
    $id = filter_input(INPUT_POST, 'id');
    deletePatient($id);
}*/

if (isset($_POST['searchButton'])) {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $married = filter_input(INPUT_POST, 'married');
}
else{
    $first_name = '';
    $last_name = '';
    $married = '';
}

$patients = searchPatients($first_name, $last_name, $married);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Week 6 Patient Form</title>
</head>

<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <!-- Search Form -->
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" />

        <label>Last Name:</label>
        <input type="text" name="last_name" />

        <label for="married">Married (yes/no):</label>
        <select name="married">
            <option value=""></option>
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select>
        <input type="submit" name="searchButton" value="Search" /><br><br>
    </form>
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
        <?php foreach ($patients as $p):
        ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['first_name']; ?></td>
            <td><?php echo $p['last_name']; ?></td>
            <td><?php echo $p['married']==0?"No":"Yes"; ?></td>
            <td><?php echo $p['birth_date']; ?></td>

            <td><a href="edit_patients.php?id=<?php echo $p['id']; ?>">Edit</a></td>
            <td>
                <form method="post" action="viewPatients.php">
                    <input type="hidden" name="delete" value="<?php echo $p['id']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="patientForm.php">Add Patient</a>
<?php echo "|   ";?>
<a href="viewPatients.php">Reset</a>
<?php echo "|   ";?>
<a href="logoff.php">Logoff</a>
</body>
</html>