<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=shop", "root", "12345", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $errorInfo = $db->errorInfo();

    if ($db->errorCode() != 0000) {
        echo "SQL-error: ".$errorInfo[2].".";
    }
    
}   catch (PDOExceprtion $e) {
    die ('ERROR: '.$e->getMessage());
}