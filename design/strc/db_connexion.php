<?php
$db__host = 'localhost';
$db__name = 'expi_dev';

$db__user = 'root';
$db__pw = '';

try {
    $db = new PDO("mysql:host=$db__host;dbname=$db__name", $db__user, $db__pw);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
