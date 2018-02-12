<?php
$slides = array();
if (isset($_POST['search']) AND !empty($_POST['search'])) {
  $que_skel = 'SELECT * FROM experiences e';
  if (isset($_POST['type']) AND !empty($_POST['type'])) {
    $que_skel .= ' INNER JOIN types t ON e.type_id = t.id WHERE MATCH(t.id)' .
      ' AGAINST("' . escaped_string($_POST['type']) . ') AND")';
  }
  $que_skel .= ' MATCH() AGAINST("' . escaped_string($_POST['search']) .
    ' LIMIT 3")';

  $que_xp = $db->query($que_skel);

  while ($data_xp = $que_xp->fetch(PDO::FETCH_ASSOC)) {
    array_push($slides, new Slide);
    $slides[count($slides) - 1]->init(
      $data_xp['id'],
      $data_xp['title'],
      $data_xp['img'],
      $data_xp['alt'],
      $data_xp['short_description'],
      $data_xp['date_update']
    );
  }
}
?>
