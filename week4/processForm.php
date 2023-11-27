<?php

    include (__DIR__ . '/patientDetails.php');

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $married = $_POST["married"];
        $birth_date = $_POST["birth_date"];

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

        if (empty($errors)) {
            $age = age($birth_date);

            // Display confirmation
            echo "<h2>Confirmation</h2>";
            echo "First Name: $first_name<br>";
            echo "Last Name: $last_name<br>";
            echo "Married: $married<br>";
            echo "Birth Date: $birth_date<br>";
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