<?php
$db__host = '0.0.0.0:9006';
$db__name = 'expi_dev';

$db__user = 'expi_master';
$db__pw = 'Pr0t3ctTh3M@st3r';

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
