<?php
$allowed_pages = array(
  'accueil',
);

if (isset($page)) {
  if (!empty($page) AND in_array($page, $allowed_pages)) {
    switch ($page) {
      case 1 :
        //TODO: gestion des pages à afficher
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
