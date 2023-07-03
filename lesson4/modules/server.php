<?php
require_once ('modules/db.php');
require_once ('modules/functions.php');

try {

    $result = getData($id);

    $errorInfo = $db->errorInfo();

    if ($db->errorCode() != 0000) {
        echo "SQL-error: ".$errorInfo[2].".";
    }

    $products = [];

    while ($row = $result->fetch()) {
        $products[] = $row;
    }
}   catch (PDOException $e) {
    die ('ERROR: '.$e->getMessage());
}