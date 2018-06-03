<?php
for ($i = 0; $i < count($where_inf->nav_sections); $i++) {
  if ((!isConnected() && ($i < 2 || $i > 3)) || isConnected()) {
    $where_inf->showNav($i, '_self');
  }
}
?>
