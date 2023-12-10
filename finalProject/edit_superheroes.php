<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhero Form</title>

</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '/model_superheroes.php';
include __DIR__ . '/db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$selectedSuperhero = null;
foreach ($superheroes as $s) {
    if ($s['id'] == $id) {
        $selectedSuperhero = $s;
        break;
    }
}


$id = $selectedSuperhero["id"] ?? null;
$superhero_name = $selectedSuperhero["superhero_name"] ?? '';
$secret_identity = $selectedSuperhero['secret_identity'] ?? '';
$universe = $selectedSuperhero["universe"] ?? '';
$main_power = $selectedSuperhero["main_power"] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? $id;
    $superhero_name = $_POST['superhero_name'] ?? $superhero_name;
    $secret_identity = $_POST['secret_identity'] ?? $secret_identity;
    $universe = $_POST['universe'] ?? $universe;
    $main_power = $_POST['main_power'] ?? $main_power;

    $result = updateSuperhero($id, $superhero_name, $secret_identity, $universe, $main_power);

    if ($result === 'Data Updated') {
        header("Location: viewSuperheroes.php");
        exit();
    } else {
        echo "Update failed. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhero Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Superhero Form</h2>

<form name="superhero" method="post">

    <div class="wrapper">
        <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="label">
            <label>Superhero Name:</label>
        </div>
        <div>
            <input type="text" name="superhero_name" value="<?= $superhero_name; ?>" required/>
        </div>
        <div class="label">
            <label>Secret Identity:</label>
        </div>
        <div>
            <input type="text" name="secret_identity" value="<?= $secret_identity; ?>" required/>
        </div>
        <div class="label">
            <label>Universe:</label>
        </div>
        <div>
            <input type="text" name="universe" value="<?= $universe; ?>" required/>
        </div>
        <div class="label">
            <label>Main Power:</label>
        </div>
        <div>
            <input type="text" name="main_power" value="<?= $main_power; ?>" required/>
        </div>

        <div>
            <input type="submit" name="updateButton" id="submit">
        </div>
    </div>

</form>

</body>
</html>