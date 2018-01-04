<?php
$db__host = 'ectopneorsdb1a.mysql.db';
$db__name = 'ectopneorsdb1a';

$db__user = 'ectopneorsdb1a';
$db__pw = 'P4nd0r4sB0x';

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