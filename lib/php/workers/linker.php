<?php
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
?>
