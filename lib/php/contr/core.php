<?php
if (isset($wh) && $wh != null) {
  require_once(objPath('control', 'pages.php'));
} else if (isset($mod) && $mod != null) {
  $allowed_modules = array(
    1
  );
  require_once(objPath('control', 'modules.php'));
} else {
  include_once(objPath('view', '404.php'));
}
?>
