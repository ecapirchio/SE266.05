<!DOCTYPE html>
<html>
<head>
    <title>Patient Intake Form</title>
</head>
<body>
    <h2>Patient Intake Form</h2>
    <form method="post" action="process_form.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>
        
        <label for="married">Married (yes/no):</label>
        <select name="married" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br><br>
        
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" required><br><br>
        
        <label for="height">Height (in ft/in):</label>
        <input type="number" name="height" required><br><br>
        
        <label for="weight">Weight (in lbs):</label>
        <input type="number" name="weight" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php

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

        

    ?>

</body>
</html>
