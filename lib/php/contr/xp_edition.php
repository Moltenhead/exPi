<?php
if (isset($_GET['xp']) && $_GET['xp'] != null) {
  if (xpExists($db)) {
    include_once(objPath('view', 'xp_edition.php'));
  } else {
    include_once(objPath('view', 'no_find.php'));
  }
} else {
  include_once(objPath('view', 'no_find.php'));
}
?>
