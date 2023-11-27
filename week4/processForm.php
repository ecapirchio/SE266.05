<?php

    include (__DIR__ . '/addPatient.php');

    function age($bdate) {
        $date = new DateTime($bdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    function isDate($dt) {
        $date_arr = explode('-', $dt);
        return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
    }

    function poundsToKilograms($pounds) {
        return $pounds * 0.453592; // 1 pound = 0.453592 kilograms
    }

    function bmi($ft, $inch, $weight_lbs) {
        // Convert feet and inches to centimeters
        $height_cm = ($ft * 30.48) + ($inch * 2.54);
        
        // Convert weight from pounds to kilograms
        $weight_kg = poundsToKilograms($weight_lbs);

        // Calculate BMI
        if ($height_cm <= 0 || $weight_kg <= 0) {
            return 0; // Handle invalid input
        }
        $bmi = $weight_kg / (($height_cm / 100) * ($height_cm / 100));
        return $bmi;
    }

    function bmiDescription($bmi) {
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $married = $_POST["married"];
        $birth_date = $_POST["birth_date"];
        $height_ft = $_POST["height_ft"];
        $height_inch = $_POST["height_inch"];
        $weight_lbs = $_POST["weight_lbs"];

        $errors = array();

        if (empty($first_name)) {
            $errors[] = "First name can't be empty.";
        }

        if (empty($last_name)) {
            $errors[] = "Last name can't be empty.";
        }

        if (empty($married)) {
            $errors[] = "Please select 'Married (yes/no)' option.";
        }

        if (!isDate($birth_date)) {
            $errors[] = "Birth date must be a valid date.";
        }

        if (!is_numeric($height_ft) || !is_numeric($height_inch) || !is_numeric($weight_lbs)) {
            $errors[] = "Height and weight must be valid numbers.";
        }

        if (empty($errors)) {
            $age = age($birth_date);
            $bmi = bmi($height_ft, $height_inch, $weight_lbs);
            $bmiClassification = bmiDescription($bmi);

            // Display confirmation
            echo "<h2>Confirmation</h2>";
            echo "First Name: $first_name<br>";
            echo "Last Name: $last_name<br>";
            echo "Married: $married<br>";
            echo "Birth Date: $birth_date<br>";
            echo "Height: $height_ft feet $height_inch inches<br>";
            echo "Weight: $weight_lbs pounds<br>";
            echo "Age: $age years<br>";
            echo "BMI: " . number_format($bmi, 1) . "<br>";
            echo "BMI Classification: $bmiClassification<br>";
        } else {
            // Display validation errors
            echo "<h2>Validation Errors</h2>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }

    
    $file = basename($_SERVER['PHP_SELF']);
    $mod_date=date("F d Y h:i:s A", filemtime($file));
    echo "<br>" . "File last updated $mod_date";

?>