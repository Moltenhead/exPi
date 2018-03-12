<?php
require_once(objPath('mod', 'search.php'));
require_once(objPath('mod', 'pagination_query.php'));

if ($nb_rows > 0) {
  include(objPath('view', 'horizontal_pagination.php'));

  include_once(objPath('view', 'magic_hat.php'));
  include_once(objPath('view', 'de_board.php'));

  include(objPath('view', 'horizontal_pagination.php'));
} else {
  include_once(objPath('view', 'no_find.php'));
}
?>
