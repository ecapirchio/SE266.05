<?php

    include(__DIR__ . '/db.php');

    function getPatients () {
        global $db;
        $results = [];
        $stmt = $db->prepare("SELECT id, first_name, last_name, married, birth_date FROM patients ORDER BY last_name");

        if ( $stmt->execute() && $stmt->rowcount() > 0 ) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addPatient ($f, $l, $m, $b) {
        global $db;
        $stmt = $db->prepare("INSERT INTO patients SET first_name = :first_name, last_name = :last_name, married = :married, birth_date = :birth_date");
        $binds = array(
            ":first_name" => $f,
            ":last_name" => $l,
            ":married" => $m,
            ":birth_date" => $b
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        return ($results);
    }
    $patients = getPatients();

?>