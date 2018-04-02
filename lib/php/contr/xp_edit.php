<?php
if (isset($_POST['title'])) {
  include_once(objPath('view', 'xp_edit_post.php'));
} else {
  require_once(objPath('mod', 'xp_get.php'));
  include_once(objPath('view', 'xp_edit_db.php'));
}
?>
