<?php
/*Query xp using url sent UUID
*/

$xp_uuid = htmlspecialchars($_GET['xp']);

$data_xp = $db->query(
  'SELECT e.uuid,
    e.title,
    t.name AS type,
    t.class AS type_class,
    ei.uuid AS img_uuid,
    ei.href AS ext,
    ei.alt AS img_alt,
    e.short_description,
    e.long_description,
    e.themes,
    e.created_at,
    e.update_last
      FROM experiences e
        INNER JOIN interests_types t ON t.id = e.type_id
        LEFT JOIN experiences_images ei ON ei.uuid = e.img_uuid
          WHERE e.uuid = ' .
            $db->quote($xp_uuid))->fetchAll(PDO::FETCH_ASSOC)[0];
$img_href = join('',
  [
    $data_xp['img_uuid'],
    substr(
      $data_xp['ext'],
      strrpos(
        $data_xp['ext'],
        '.'))]);
$img_href = ($img_href && !empty($img_href)) ? $img_href : NULL;
$xp = new Xp(
  $data_xp['uuid'],
  $data_xp['title'],
  $data_xp['type'],
  $data_xp['type_class'],
  $img_href,
  $data_xp['img_alt'],
  $data_xp['short_description'],
  $data_xp['long_description'],
  $data_xp['themes'],
  $data_xp['created_at'],
  $data_xp['update_last']);
?>
