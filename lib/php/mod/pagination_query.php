<?php
$que_skel = 'SELECT
  COUNT(id)
  FROM experiences';
if (isset($_POST['search']) || isset($_POST['type'])) {
  if (
    isset($_POST['search']) &&
    !empty($_POST['search']) &&
    !empty($_POST['search']) != null
  ) {
    $que_skel .= ' WHERE MATCH(
        title,
        short_description,
        long_description)
          AGAINST(' . $db->quote($_POST['search']) . ')';
    if (
      isset($_POST['type']) &&
      !empty($_POST['type']) &&
      $_POST['type'] >= 0
    ) {
      $que_skel .= ' AND type_id = ' . (int) $_POST['type'];
    }
  } else if (
    isset($_POST['type']) &&
    !empty($_POST['type']) &&
    $_POST['type'] >= 0
  ) {
    $que_skel .= ' WHERE type_id = ' . (int) $_POST['type'];
  }
} else {
  $que_skel .= ' LIMIT ' . $max_default_query_rows;
}

$que_nb_rows = $db->query($que_skel);
$nb_rows = $que_nb_rows->fetch(PDO::FETCH_COLUMN, 0);
?>
