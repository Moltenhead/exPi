<?php //TODO: in need of evolution for theme and places matching
$slides = array();
$que_slides_skel = 'SELECT
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
  $que_slides_skel .= ' WHERE MATCH(
      e.title,
      e.short_description,
      e.long_description)
        AGAINST(' . $db->quote($_POST['search']) . ')';
}

if (isset($_POST['type']) AND !empty($_POST['type']) AND $_POST['type'] != 0) {
  $que_slides_skel .= ' AND e.type_id = ' . (int) $_POST['type'];
}

$que_slides_skel .= ' LIMIT 3 OFFSET ' . ($page - 1) * $pagination;
$que_slides = $db->query($que_slides_skel);

while ($data_slides = $que_slides->fetch(PDO::FETCH_ASSOC)) {
  array_push($slides, new Slide(
      $data_slides['uuid'],
      $data_slides['title'],
      $data_slides['img_title'],
      $data_slides['img_href'],
      $data_slides['alt'],
      $data_slides['short_description'],
      $data_slides['created_at'],
      $data_slides['update_last']
    )
  );
}
?>
