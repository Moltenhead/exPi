<?php
for ($i = 0; $i < count($where_inf->nav_sections); $i++) {
  if (
    (!isConnected() &&
    ($where_inf->getNav($i,'id') != 2 && $where_inf->getNav($i,'id') != 3)) ||
    isConnected()
  ) {
    $where_inf->showNav($i, '_self', isConnected());
  }
}
?>
