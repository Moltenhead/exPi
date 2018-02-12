<?php
$allowed_pages = array(
  'accueil',
);

if (isset($page_id)) {
  if (!empty($page_id) && in_array($allowed_pages, $page_id)) {
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
