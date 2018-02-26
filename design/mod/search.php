<?php //TODO: in need of evolution for theme and places matching
$slides = array();
$que_skel = 'SELECT
  e.uuid,
  e.title,
  i.title AS img_title,
  i.href AS img_href,
  i.alt,
  e.short_description,
  p.title,
  p.longitude,
  p.latitude,
  e.created_at,
  e.update_last
  FROM experiences e
    LEFT JOIN experiences_images i ON e.id = i.experience_id
    LEFT JOIN places p ON e.place_id = p.id';
if (isset($_POST['search']) AND !empty($_POST['search'])) {
  $que_skel .= ' WHERE MATCH(
      e.title,
      e.short_description,
      e.long_description)
        AGAINST(' . $db->quote($_POST['search']) . ')';
}

if (isset($_POST['type']) AND !empty($_POST['type']) AND $_POST['type'] != 0) {
  $que_skel .= ' AND e.type_id = ' . (int) $_POST['type'];
}

$que_skel .= ' LIMIT 3'; //TODO: need edition when pagination gets implemented
$que_xp = $db->query($que_skel);

while ($data_xp = $que_xp->fetch(PDO::FETCH_ASSOC)) {
  array_push($slides, new Slide(
      $data_xp['uuid'],
      $data_xp['title'],
      $data_xp['img_title'],
      $data_xp['img_href'],
      $data_xp['alt'],
      $data_xp['short_description'],
      $data_xp['created_at'],
      $data_xp['update_last']
    )
  );
}
?>
