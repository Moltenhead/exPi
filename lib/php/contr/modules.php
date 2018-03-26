<?php
switch ($mod) {
  case 'xp_crud':
    include_once(objPath('control', 'xp_crud.php'));
    break;
  default:
    include_once(objPath('view', '404.php'));
    break;
}
?>
