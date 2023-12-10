<?php
// Include the database connection and patient model files
include(__DIR__ . '/db.php');
include (__DIR__ . '/model_superheroes.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
else {
    // Load all patients initially
    $superheroes = getSuperheroes();
}

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $result = deletePatient($id);

        if ($result === 'Data Deleted') {
            header("Location: viewPatients.php");
            exit();
        }
    }
}*/

if(isset($_POST['deleteSuperhero'])){
    $id = filter_input(INPUT_POST, 'id');
    deleteSuperhero($id);
}

if (isset($_POST['searchButton'])) {
    $superhero_name = filter_input(INPUT_POST, 'superhero_name');
    $secret_identity = filter_input(INPUT_POST, 'secret_identity');
    $universe = filter_input(INPUT_POST, 'universe');
    $main_power = filter_input(INPUT_POST, 'main_power');
}
else{
    $superhero_name = '';
    $secret_identity = '';
    $universe = '';
    $main_power = '';
}

$superheroes = searchSuperheroes($superhero_name, $secret_identity, $universe, $main_power);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Final Project</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    
    <!-- Search Form -->
    <form method="post">
        <h3>Search Superheroes</h3>

        <label>Superhero Name:</label>
        <input type="text" name="superhero_name" />

        <label>Secret Identity:</label>
        <input type="text" name="secret_identity" />

        <label>Universe:</label>
        <input type="text" name="universe" />

        <label>Main Power:</label>
        <input type="text" name="main_power" />

        <input type="submit" name="searchButton" value="Search" /><br><br>
    </form>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Superhero Name</th>
            <th>Secret Identity</th>
            <th>Universe</th>
            <th>Main Power</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($superheroes as $s):
        ?>
        <tr>
            <td><?php echo $s['id']; ?></td>
            <td><?php echo $s['superhero_name']; ?></td>
            <td><?php echo $s['secret_identity']; ?></td>
            <td><?php echo $s['universe']; ?></td>
            <td><?php echo $s['main_power']; ?></td>

            <td><a href="edit_superheroes.php?id=<?php echo $s['id']; ?>">Edit</a></td>
            <td>
                <form method="post" action="viewSuperheroes.php">
                    <input type="hidden" name="delete" value="<?php echo $s['id']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="superheroForm.php">Add Superhero</a>
<?php echo "|   ";?>
<a href="viewSuperheroes.php">Reset</a>
<?php echo "|   ";?>
<a href="logoff.php">Logoff</a>
</body>
</html>