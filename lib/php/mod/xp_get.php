<?php
/*Query xp using url sent UUID
*/

$xp_uuid = $_GET['xp'];
$que_xp = $db->query(
  'SELECT e.*
    FROM experiences e
      WHERE e.uuid = ' . $xp_uuid);
$data_xp = $que_xp->fetch(PDO::FETCH_ASSOC);

$xp = new Xp(
  //TODO: add needed parameter ; 10 at the moment
);
?>
