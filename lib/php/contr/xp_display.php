<?php
if (isset($_GET['xp']) && $_GET['xp'] != null) {echo xExists($db);
  if (xpExists($db)) {
    require_once(objPath('mod', 'xp_get.php'));
    include_once(objPath('view', 'xp_display.php'));
  } else {
    include_once(objPath('view', 'no_find.php'));
  }
} else {
  include_once(objPath('view', 'no_find.php'));
}
?>
