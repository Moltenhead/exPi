<?php
$allowed_pages = array(
  'accueil',
);

if (isset($page_id)) {
  if (!empty($page_id) AND in_array($allowed_pages, $page_id)) {
    switch ($page) {
      case 1 :
        include_once(objPath('page', 'home.php'));
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
