<?php
if (isset($wh) && $wh != null) {
  require_once(objPath('view', 'pages_display.php'));
} else if (isset($mod) && $mod != null) {
  require_once(objPath('control', 'modules.php'));
} else {
  include_once(objPath('view', '404.php'));
}
?>
