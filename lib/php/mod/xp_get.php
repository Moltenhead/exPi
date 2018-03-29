<?php
/*Query xp using url sent UUID
*/

$xp_uuid = htmlspecialchars($_GET['xp']);

$data_xp = $db->query(
  'SELECT e.*
    FROM experiences e
      WHERE e.uuid = ' . $xp_uuid)->fetch(PDO::FETCH_ASSOC);

$xp = new Xp(
  //TODO: add needed parameter ; 10 at the moment
);
?>
