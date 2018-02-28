<?php
/* ------------------------ OPTION SELECT -----------------------*/
//stylesheets extension
$style_ext = '.css';
//'http' or 'https'
$protocole_select = 'http'; // TODO: a éditer lors du passage HTTPS

//where to start for first page enumeration
$starting_page = 1;
//how much xps within the de_board
$pagination = 24;
//how much slides within the magic_hat (meant to be a multiple of 3)
$slides_number = 9;

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
  'PAGE',
  'OBJ',
  'MOD',
  'VIEW'
);

/* -------------------- ACTIVE FILE PATHS ---------------------*/
define('PHP_SELF', htmlspecialchars($_SERVER['PHP_SELF']));
define('URI', htmlspecialchars($_SERVER['REQUEST_URI']));

/* ------------------------- ROOTS -------------------------*/
define('ROOT', htmlspecialchars($_SERVER['DOCUMENT_ROOT']));
//useful roots
define('STRC_ROOT', ROOT . PREFIX . '/design/strc/');
define('PAGE_ROOT', ROOT . PREFIX . '/pages/');
define('OBJ_ROOT', ROOT . PREFIX . '/lib/php/obj/');
define('MOD_ROOT', ROOT . PREFIX . '/lib/php/mod/');
define('VIEW_ROOT', ROOT . PREFIX . '/lib/php/view/');

/* ------------------------- LINKS -------------------------*/
define('H_SELECT', $protocole_select);
define('HTTPH', H_SELECT . '://' . $_SERVER['HTTP_HOST'] . PREFIX);
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
$a__name = substr(
  PHP_SELF, strrpos(PHP_SELF, '/') + 1,
  strlen(PHP_SELF) - strrpos(PHP_SELF, '/')
);
$a__shortname = substr(
  $a__name, 0,
  strlen($a__name) - strrpos($a__name, '.') + 1
);
//to call with styLink()
define('CSSELF', 'css_' . $a__shortname);

/* --------------------- TOOLS ---------------------*/
/*OBJECT PATH GENERATOR*/
function objPath($access_type, $object_name)
{
  global $href_opt, $root_opt;

  //option list string, used in $access_type missmatch cases
  $opt_count = count($href_opt) - 1;
  $opt_string = '';
  foreach ($href_opt as $opt_id => $opt) {
    if ($opt_id < $opt_count) {
      $opt_string .= '<b>"' . $opt . '"</b> or ';
    } else if ($opt_id === $opt_count) {
      $opt_string .= '<b>"' . $opt . '"</b>';
    }
  }

  if (gettype($object_name) === 'string') {
    if (gettype($access_type) === 'string') {
      if (in_array(strtoupper($access_type), $href_opt) OR in_array(strtoupper($access_type), $root_opt)) {
        //ternary operator
        return (!in_array(strtoupper($access_type), $root_opt)) ?
          constant('H_' . strtoupper($access_type)) . $object_name :
          constant(strtoupper($access_type) . '_ROOT') . $object_name;
          //ternary end
      } else {
        trigger_error(
          'invalid parameter, unexpected \'' .
          $access_type .
          '\' on <b>second parameter</b>, expecting ' .
          $opt_string,
          E_USER_ERROR
        );
      }
    } else {
      trigger_error(
        'invalid parameter, unexpected ' .
        gettype($access_type) .
        ' on <b>second parameter</b>, expecting \'string\' type',
        E_USER_ERROR
      );
    }
  } else {
    trigger_error(
      'invalid parameter, unexpected ' .
      gettype($style_names) .
      ' on <b>first parameter</b>, expecting \'string\' type',
      E_USER_ERROR
    );
  }
}

/*STYLESHEETS QUICK-LINKER*/
function styLink($style_names)
{
  $echo_start = '<link rel="stylesheet" type="text/css" href="';
  switch (gettype($style_names)) {
    case 'array' :
      for ($i = 0; $i < count($style_names); $i++) {
        echo $echo_start . objPath('css', $style_names[$i]) . STYLE_EXT . '" />
        ';
      }
      break;
    case 'string' :
      echo $echo_start . objPath('css', $style_names) . STYLE_EXT . '" />
      ';
      break;
    //if not an 'array' or 'string' type
    default :
      trigger_error(
        'invalid parameter, unexpected ' .
        gettype($style_names) .
        ', expecting \'array\' or \'string\' type'
      );
      break;
  }
}

/*JS QUICK-LINKER*/
function scriptLink($script_names)
{
  $echo_start = '<script src="';
  switch (gettype($script_names)) {
    case 'array' :
      for ($i = 0; $i < count($script_names); $i++) {
        echo $echo_start . objPath('js', $script_names[$i]) . '.js"></script>';
      }
      break;
    case 'string' :
      echo $echo_start . objPath('js', $script_names) . '.js" /></script>';
      break;
    //if not an 'array' or 'string' type
    default :
      trigger_error(
        'invalid parameter, unexpected ' .
        gettype($script_names) .
        ', expecting \'array\' or \'string\' type',
        E_USER_ERROR
      );
      break;
  }
}

/*USER CONNECTION DETECTION*/
function isConnected()
{
  return (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
}

/* ------------------- CLASSES AUTOLOADER --------------------*/
function __autoload($class_name)
{
  include objPath('obj', $class_name . '.php');
}

/* --------------------- PAGINATION MANAGEMENT --------------------- */
$page;
(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] != null) ?
  $page = (int) $_GET['page'] :
  $page = $starting_page;
;
?>
