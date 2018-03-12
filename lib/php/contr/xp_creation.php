<?php
$allowed_disp = array(
  'create',
  'how-to'
);

if (isset($_GET['disp']) && !empty($_GET['disp']) && $_GET['disp'] != null) {
  $disp = htmlspecialchars($_GET['disp']);
  if (in_array($disp, $allowed_disp)) {
    switch ($disp) {
      case 'create':
        include_once(objPath('view', 'xp_create.php'));
        break;
      case 'how-to':
        include_once(objPath('view', 'xp_howto.php'));
        break;

      default:
        include_once(objPath('view', 'xp_create.php'));
        break;
    }
  } else {
    include_once(objPath('view', '404.php'));
  }
} else {
  include_once(objPath('view', 'xp_create.php'));
}
?>
