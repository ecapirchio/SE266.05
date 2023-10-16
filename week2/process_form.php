<?php
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
            $errors[] = "First name cannot be empty.";
        }

        if (empty($last_name)) {
            $errors[] = "Last name cannot be empty.";
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
?>