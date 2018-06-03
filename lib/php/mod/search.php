<?php //TODO: in need of evolution for theme and places matching
$real_pagination = (int) ($page - 1) * ($xp_per_page);
$no_match = false;

$slides = array();
$que_skel = 'SELECT
  e.uuid,
  t.class AS type_class,
  e.title AS xp_title,
  i.uuid AS img_uuid,
  i.href AS ext,
  i.alt,
  e.short_description,
  p.title AS place_title,
  p.longitude,
  p.latitude,
  e.created_at,
  e.update_last
  FROM experiences e
    LEFT JOIN interests_types t ON e.type_id = t.id
    LEFT JOIN experiences_images i ON e.img_uuid = i.uuid
    LEFT JOIN locations_places p ON e.place_id = p.id';
if (
  (isset($_POST['search']) && $_POST['search'] != null) ||
  (isset($_POST['type']) && $_POST['type'] != 0)
) {
  $que_skel .= ' WHERE';
  if (isset($_POST['search']) AND !empty($_POST['search'])) {
    $que_skel .= ' MATCH(e.title, e.short_description, e.long_description)' .
      ' AGAINST(' . $db->quote($_POST['search']) . ')';
      if (isset($_POST['type']) AND !empty($_POST['type']) AND $_POST['type'] > 0) {
        $que_skel .= ' AND e.type_id = ' . (int) $_POST['type'];
      }
  } else if (isset($_POST['type']) AND !empty($_POST['type']) AND $_POST['type'] > 0) {
    $que_skel .= ' e.type_id = ' . (int) $_POST['type'];
  }
}

$que_skel .= ' ORDER BY e.id DESC LIMIT ' .
  $slides_number .
  ' OFFSET ' .
  $real_pagination;

if ($db->query($que_skel)) {
  $que_slides = $db->query($que_skel);
} else {
  $no_match = true;
  preg_replace(
    '#( MATCH){1}\(\'(\w+)\'\)( AGAINST){1}(\(\'()\'\))+#',
    '',
    $que_skel
  );
}

while ($data_slides = $que_slides->fetch(PDO::FETCH_ASSOC)) {
  $img_href = join('',
    [
      $data_slides['img_uuid'],
      substr(
        $data_slides['ext'],
        strrpos(
          $data_slides['ext'],
          '.'))]);
  $img_href = ($img_href && !empty($img_href)) ? $img_href : NULL;
  array_push($slides, new SlideXp(
      $data_slides['uuid'],
      $data_slides['type_class'],
      $data_slides['xp_title'],
      ($img_href) ? $img_href : NULL,
      $data_slides['alt'],
      $data_slides['short_description'],
      $data_slides['created_at'],
      $data_slides['update_last']));
}

$board_xps = array();
$que_board_skel = substr($que_skel, 0, strpos($que_skel, ' LIMIT ') + 6);
$que_board_skel .= ' ' .
  (int) $pagination .
  ' OFFSET ' .
  ($real_pagination + $slides_number);

$que_board_xps = $db->query($que_board_skel);
while ($data_board_xps = $que_board_xps->fetch(PDO::FETCH_ASSOC)) {
  $img_href = join('',
    [
      $data_slides['img_uuid'],
      substr(
        $data_slides['ext'],
        strrpos(
          $data_slides['ext'],
          '.'))]);
  $img_href = ($img_href && !empty($img_href)) ? $img_href : NULL;
  array_push($board_xps, new BoardXp(
    $data_board_xps['uuid'],
    $data_board_xps['type_class'],
    $data_board_xps['xp_title'],
    $img_href,
    $data_board_xps['alt'],
    $data_board_xps['short_description'],
    $data_board_xps['created_at'],
    $data_board_xps['update_last']
    )
  );
}
?>
