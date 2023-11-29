<?php

    include(__DIR__ . '/db.php');

    function getSuperheroes () {
        global $db;
        $results = [];
        $stmt = $db->prepare("SELECT id, superhero_name, secret_identity, universe, main_power FROM superheroes ORDER BY secret_identity");

        if ( $stmt->execute() && $stmt->rowcount() > 0 ) {
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addSuperhero ($superhero_name, $secret_identity, $universe, $main_power) {
        global $db;
        $stmt = $db->prepare("INSERT INTO superheroes SET superhero_name = :superhero_name, secret_identity = :secret_identity, universe = :universe, main_power = :main_power");
        $binds = array(
            ":superhero_name" => $superhero_name,
            ":secret_identity" => $secret_identity,
            ":universe" => $universe,
            ":main_power" => $main_power
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        return ($results);
    }
    $superheroes = getSuperheroes();

    function deleteSuperhero ($id){
        global $db;
        $results = [];
        $sql = "DELETE FROM superheroes WHERE id = :id";
        $stmt = $db->prepare("DELETE FROM superheroes WHERE id = :id");
        $binds = array(
            ":id" => $id
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        return ($results);
    }

    function updateSuperhero ($id, $superhero_name, $secret_identity, $universe, $main_power){
        global $db;
        $results = [];
        $sql = "UPDATE superheroes SET superhero_name = :superhero_name, secret_identity = :secret_identity, universe = :universe, main_power = :main_power WHERE id = :id";
        $stmt = $db->prepare("UPDATE superheroes SET superhero_name = :superhero_name, secret_identity = :secret_identity, universe = :universe, main_power= :main_power WHERE id = :id");
        $binds = array(
            ":id" => $id,
            ":superhero_name" => $superhero_name,
            ":secret_identity" => $secret_identity,
            ":universe" => $universe,
            ":main_power" => $main_power
        );
        if($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        return ($results);
    }

    function searchSuperheroes($superhero_name, $secret_identity, $universe, $main_power)
    {
        global $db;
        $results = [];
        $binds = array();

        
        $sql =  "SELECT * FROM  superheroes WHERE 0=0";
        if ($superhero_name != "") {
            $sql .= " AND superhero_name LIKE :superhero_name";
            $binds['superhero_name'] = '%'.$superhero_name.'%';
        }

        if ($secret_identity != "") {
            $sql .= " AND secret_identity LIKE :secret_identity";
            $binds['secret_identity'] = '%'.$secret_identity.'%';
        }
            
        if ($universe != "") {
            $sql .= " AND universe LIKE :universe";
            $binds['universe'] = '%'.$universe.'%';
        }

        if ($main_power != "") {
            $sql .= " AND main_power LIKE :main_power";
            $binds['main_power'] = '%'.$main_power.'%';
        }

        $stmt = $db->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $results = "No results";
        }

        return $results;
    }

?>