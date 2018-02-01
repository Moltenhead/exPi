<?php
/* ------------------------ OPTION SELECT -----------------------*/
//stylesheets extension
$style_ext = '.css';
//'http' or 'https'
$protocole_select = 'http'; // TODO: a éditer lors du passage HTTPS

//object typed existing directories
$access_type_opt = array (
  'STRC',
  'CSS',
  'FNT',
  'IMG',
  'VID',
  'JS',
  'PAGE'
);
$root_opt = array (
  'STRC',
  'PAGE'
);

/* -------------------- CLASSES ---------------------*/
class Link
{
  private $_title;
  private $_href;

  public function init($title, $href)
  {
    $this->_title = $title;
    $this->_href = $href;
  }
}

class Menu
{
  private $_sections = array();

  public function init_title($string)
  {
    push_array($this->_sections, string);
    $this->_sections[count($this->_sections) - 1] = array();
  }

  public function push_link($index, $title, $href)
  {
    $new_link = new Link;
    $new_link->init($title, $href);

    if (!empty($index) OR !empty($title) OR !empty($href)) {
      if (array_key_exists($index, $this->_sections)) {
        push_array($this->_sections[$index], $new_link);
      } else {
        trigger_error(
          'invalid index, menu title doesn\'t exist',
          E_USER_ERROR
        );
      }
    } else {
      trigger_error(
        'missing parameter, expecting $title, $link_title, $href',
        E_USER_ERROR
      );
    }
  }
}

/* -------------------- PAGE MANAGEMENT ---------------------*/
$page;
if (isset($_GET['page'])) {
  $page = htmlspecialchars($_GET['page']);
}

//secondMenu display filters cf: secondNav.php
$interest_menu = [
  'accueil',
  'research'
];

$profile_menu = [
  'profile'
];
// ------------

/* -------------------- ACTIVE FILE PATHS ---------------------*/
define('PHP_SELF', htmlspecialchars($_SERVER['PHP_SELF']));
define('URI', htmlspecialchars($_SERVER['REQUEST_URI']));

/* ------------------------- ROOTS -------------------------*/
define('ROOT', htmlspecialchars($_SERVER['DOCUMENT_ROOT']));
//useful roots
define('STRC_ROOT', ROOT . PREFIX . '/design/strc/');
define('PAGE_ROOT', ROOT . PREFIX . '/pages/');

/* ------------------------- LINKS -------------------------*/
define('H_SELECT', $protocole_select);
define('HTTPH', H_SELECT . '://' . $_SERVER['HTTP_HOST'] . PREFIX);
//useful links
define('H_CSS', HTTPH . 'design/css/');
define('H_FNT', HTTPH . 'design/fnt/');
define('H_IMG', HTTPH . 'design/img/');
define('H_VID', HTTPH . 'design/vid/');
define('H_JS', HTTPH . 'lib/js/');

/* -------------------- FORMATING ---------------------*/
define('STYLE_EXT', $style_ext);

/* -------------------- ACTIVE FILE NAMES ---------------------*/
$a__name = substr(PHP_SELF, strrpos(PHP_SELF, '/') + 1, strlen(PHP_SELF) - strrpos(PHP_SELF, '/'));
$a__shortname = substr($a__name, 0, strlen($a__name) - strrpos($a__name, '.') + 1);
//to call with styLink()
define('CSSELF', 'css_' . $a__shortname);

/* --------------------- TOOLS ---------------------*/
/*OBJECT PATH GENERATOR*/
function objPath($access_type, $object_name)
{
  global $access_type_opt, $root_opt;

  //option list string, used in $access_type missmatch cases
  $opt_count = count($access_type_opt) - 1;
  $opt_string = '';
  foreach ($access_type_opt as $opt_id => $opt) {
    if ($opt_id < $opt_count) {
      $opt_string .= '<b>"' . $opt . '"</b> or ';
    } else if ($opt_id === $opt_count) {
      $opt_string .= '<b>"' . $opt . '"</b>';
    }
  }

  if (gettype($object_name) === 'string') {
    if (gettype($access_type) === 'string') {
      if (in_array(strtoupper($access_type), $access_type_opt)) {
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
        ', expecting \'array\' or \'string\' type'
      );
      break;
  }
}
?>
