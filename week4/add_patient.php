<?php
// Include your database connection code here
$ini = parse_ini_file('config.ini'); // Assuming you have a configuration file

try {
    $db = new PDO(
        "mysql:host=cs.neit.edu" . $ini['servername'] . ";port=" . $ini['port'] . ";dbname=" . $ini['dbname'],
        $ini['username'],
        $ini['password']
    );
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $first_name = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $marital_status = filter_var($_POST["marital_status"], FILTER_SANITIZE_STRING);
    $birth_date = $_POST["birth_date"];
    $height = floatval($_POST["height"]);
    $weight = floatval($_POST["weight"]);

    // Calculate the age and BMI here
    $current_date = new DateTime();
    $birthdate = new DateTime($birth_date);
    $age = $current_date->diff($birthdate)->y;
    $bmi = calculateBMI($height, $weight);
    $bmi_classification = classifyBMI($bmi);

    // Insert the patient's information into your database
    // Replace these placeholders with your actual database insertion code
    $sql = "INSERT INTO patients (first_name, last_name, marital_status, birth_date, height, weight, age, bmi, bmi_classification) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$first_name, $last_name, $marital_status, $birth_date, $height, $weight, $age, $bmi, $bmi_classification]);

    // Redirect back to the View Patients page
    header("Location: view_patients.php");
    exit;
}

// Define a function to calculate BMI
function calculateBMI($height, $weight) {
    // Implement the BMI calculation formula here
    // BMI = weight (kg) / (height (m) * height (m))
    return ($weight / (($height * 0.3048) * ($height * 0.3048))); // Convert height from feet to meters
}

// Define a function to classify BMI
function classifyBMI($bmi) {
    // Implement your BMI classification logic here
    // Example classification ranges:
    if ($bmi < 18.5) {
        return "Underweight";
    } elseif ($bmi < 24.9) {
        return "Normal Weight";
    } elseif ($bmi < 29.9) {
        return "Overweight";
    } else {
        return "Obese";
    }
}