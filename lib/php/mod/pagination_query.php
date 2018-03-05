<?php
$que_nb_lines = $pdo->query(
  'SELECT COUNT(id) AS nb
    FROM experiences' .
  (isset($_POST['search']) AND !empty($_POST['search'])) ?
      ' WHERE MATCH(
        e.title,
        e.short_description,
        e.long_description)
          AGAINST(' . $db->quote($_POST['search']) . ')' :
      ' LIMIT 100';
);
?>
