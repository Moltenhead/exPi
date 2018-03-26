<?php
$from = (isset($_GET['from'])) ?
  htmlspecialchars($_GET['from']) :
  null;

$home_redir = '<meta http-equiv="refresh" content="3;url=' . HTTPH;

if (isset($from) && $from != null) {
  switch ($from) {
    case 'creation_experience':
      include_once(objPath('mod', 'xp_create.php'));
      break;
    default:
      echo $home_redir .
        '" />La page précédente indéquée n\'existe pas.</br>' .
        'Redirection vers la page d\'accueil ...';
      break;
  }
} else {
  echo $home_redir .
    '" />Nous ne savons pas d\'où vous provennez.</br>' .
    'Redirection vers la page d\'accueil ...';
}
?>
