<?php
$allowed_pages = array(
  1,
  4
);

if (isset($page_inf)) {
  $page_id = (int) $page_inf->get('id');
  if (!empty($page_id) && in_array($page_id, $allowed_pages)) {
    switch ($page_id) {
      case 1 :
        include_once(objPath('page', 'home.php'));
        break;
      case 4 :
        include_once(objPath('page', 'xp_display.php'));
        break;
      default :
        break;
    }
  } else {
    //TODO: intégrer le messages d'erreur
  }

} else {
  include_once(objPath('page', 'home.php'));
}
?>
