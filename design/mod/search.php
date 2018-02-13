<?php
$slides = array();
$que_skel = 'SELECT
  e.uuid,
  e.title,
  ty.name,
  ty.class,
  th.name,
  th.class,
  i.href,
  i.alt,
  e.short_description,
  p.title,
  p.longitude,
  p.latitude
  FROM experiences e
    LEFT JOIN experiences_images i ON e.id = i.experience_id
    LEFT JOIN types ty ON e.type_id = ty.id
    LEFT JOIN themes th
    LEFT JOIN places p ON e.place_uuid = p.uuid';
if (isset($_POST['search']) AND !empty($_POST['search'])) {
  if (isset($_POST['type']) AND !empty($_POST['type'])) {
    $que_skel .= ' WHERE MATCH(ty.id)' .
      ' AGAINST(' . $db->quote(htmlspecialchars($_POST['type'])) . ') AND';
  }
  $que_skel .= ' MATCH(e.title, th.title) AGAINST(' . $db->quote(htmlspecialchars($_POST['search'])) .
    ')';
} else {
}
$que_skel .= ' LIMIT 3';

$que_xp = $db->query($que_skel);

while ($data_xp = $que_xp->fetch(PDO::FETCH_ASSOC)) { var_dump($data_xp);
  array_push($slides, new Slide);
  $slides[count($slides) - 1]->init(
    $data_xp['uuid'],
    $data_xp['title'],
    $data_xp['img'],
    $data_xp['alt'],
    $data_xp['short_description'],
    $data_xp['date_update']
  );
}
?>
