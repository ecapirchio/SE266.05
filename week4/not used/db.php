<?php 

    $ini = parse_ini_file('dbconfig.ini');

    try {
        $db = new PDO("mysql:host=" . $ini['servername'] . 
                      ";port=" . $ini['port'] . 
                      ";dbname=" . $ini['dbname'], 
                      $ini['username'], 
                      $ini['password']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }    
?>