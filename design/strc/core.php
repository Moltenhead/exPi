<?php
$allowed_pages = array(
  1,
  2,
  4
);

if (isset($where_inf)) {
  $where_id = (int) $where_inf->get('id');
  if (!empty($where_id) && in_array($where_id, $allowed_pages)) {
    switch ($where_id) {
      case 1 :
        include_once(objPath('page', 'home.php'));
        break;
      case 2 :
        include_once(objPath('page', 'xp_create.php'));
        break;
      case 4 :
        include_once(objPath('page', 'xp_display.php'));
        break;
      default :
        include_once(objPath('page', 'home.php'));
        break;
    }
  } else {
    //TODO: intégrer le messages d'erreur
  }

} else {
  include_once(objPath('page', 'home.php'));
}
?>
