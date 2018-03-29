<?php
//object typed existing directories
$href_opt = array (
  'CSS',
  'FNT',
  'IMG',
  'VID',
  'JS',
  'UP_IMG'
);
//
$root_opt = array (
  'STRC',
  'WORK',
  'PAGE',
  'CLASS',
  'MOD',
  'VIEW',
  'CONTROL'
);

/* -------------------- ACTIVE FILE PATHS ---------------------*/
define('PHP_SELF', htmlspecialchars($_SERVER['PHP_SELF']));
define('URI', htmlspecialchars($_SERVER['REQUEST_URI']));

/* ------------------------- ROOTS -------------------------*/
define('ROOT', htmlspecialchars($_SERVER['DOCUMENT_ROOT']) . PREFIX . '/');
//useful roots
define('STRC_ROOT', ROOT . 'design/strc/');
define('WORK_ROOT', ROOT . 'lib/php/workers/');
define('PAGE_ROOT', ROOT . 'pages/');
define('CLASS_ROOT', ROOT . 'lib/php/class/');
define('MOD_ROOT', ROOT . 'lib/php/mod/');
define('VIEW_ROOT', ROOT . 'lib/php/view/');
define('CONTROL_ROOT', ROOT . 'lib/php/contr/');

/* ------------------------- LINKS -------------------------*/
define('H_SELECT', $protocole_select);
define(
  'HTTPH',
  H_SELECT . '://' . htmlspecialchars($_SERVER['HTTP_HOST']) . PREFIX . '/'
);
$HTTPH = HTTPH;

//useful links
define('H_CSS', HTTPH . 'design/css/');
define('H_FNT', HTTPH . 'design/fnt/');
define('H_IMG', HTTPH . 'design/img/');
define('H_VID', HTTPH . 'design/vid/');
define('H_JS', HTTPH . 'lib/js/');
define('H_UP_IMG', HTTPH . 'uploads/img/');

/* -------------------- FORMATING ---------------------*/
define('STYLE_EXT', $style_ext);

/* -------------------- ACTIVE FILE NAMES ---------------------*/
$csself = (isset($_GET['wh'])) ?
  'css_' . htmlspecialchars($_GET['wh']) :
  'css_accueil';

$jself = (isset($_GET['wh'])) ?
  'js_' . htmlspecialchars($_GET['wh']) :
  'js_accueil';
?>
