<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Form</title>

</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '/model_patients.php';
include __DIR__ . '/db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$selectedPatient = null;
foreach ($patients as $p) {
    if ($p['id'] == $id) {
        $selectedPatient = $p;
        break;
    }
}


$id = $selectedPatient["id"] ?? null;
$first_name = $selectedPatient["first_name"] ?? '';
$last_name = $selectedPatient['last_name'] ?? '';
$married = $selectedPatient["married"] ?? 0;
$birth_date = $selectedPatient["birth_date"] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? $id;
    $first_name = $_POST['first_name'] ?? $first_name;
    $last_name = $_POST['last_name'] ?? $last_name;
    $married = isset($_POST['married']) ? 1 : 0;
    $birth_date = $_POST['birth_date'] ?? $birth_date;

    $result = updatePatient($id, $first_name, $last_name, $married, $birth_date);

    if ($result === 'Data Updated') {
        header("Location: viewPatients.php");
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
    <title>Patient Form</title>
</head>
<body>

<h2>Patient Form</h2>

<form name="patient" method="post">

    <div class="wrapper">
        <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="label">
            <label>First Name:</label>
        </div>
        <div>
            <input type="text" name="first_name" value="<?= $first_name; ?>" required/>
        </div>
        <div class="label">
            <label>Last Name:</label>
        </div>
        <div>
            <input type="text" name="last_name" value="<?= $last_name; ?>" required/>
        </div>
        <div class="label">
            <label>Married:</label>
        </div>
        <div>
            <input type="checkbox" name="married" <?php echo ($married == 1) ? 'checked' : ''; ?> />
        </div>
        <div class="label">
            <label>Birth Date:</label>
        </div>
        <div>
            <input type="date" name="birth_date" value="<?= $birth_date; ?>" required/>
        </div>

        <div>
            <input type="submit" name="updateButton" id="submit">
        </div>
    </div>

</form>

</body>
</html>