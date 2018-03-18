<?php
/* -------------------- PAGE MANAGEMENT ---------------------*/
$que_pages_names = $db->query('SELECT class FROM pages');
$pages_names = $que_pages_names->fetchAll(PDO::FETCH_COLUMN, 0);

$wh;
if (isset($_GET['wh']) && $_GET['wh'] != null) {
  if (in_array($_GET['wh'], $pages_names)) {
    $wh = htmlspecialchars($_GET['wh']);
  } else {
    $wh = 'accueil';
  }
} else {
  $wh = 'accueil';
}

$que_wh = $db->query(
  'SELECT id,
    title,
    class,
    first_nav_title AS first_title,
    first_nav_class AS first_class,
    second_nav_title AS second_title,
    second_nav_class AS second_class,
    nav_description
      FROM pages
        WHERE class = ' . $db->quote($wh)
);

$data_wh = $que_wh->fetchAll(PDO::FETCH_ASSOC);
$que_wh->closeCursor();
$data_wh = $data_wh[0];

$where_inf = new Page(
  $data_wh['id'],
  $data_wh['title'],
  $data_wh['class'],
  $data_wh['nav_description']
);
$where_inf->push_section($data_wh['first_title'], $data_wh['first_class']);
$where_inf->push_section($data_wh['second_title'], $data_wh['second_class']);

/* -------------------- TYPES DEFINITION -------------------- */
$que_types = $db->query(
  'SELECT id, name, class
    FROM interests_types
      WHERE is_used = 1'
);

$types_inf = array();
while ($data_types = $que_types->fetch(PDO::FETCH_ASSOC)) {
  $type = new Type($data_types['id'], $data_types['name'], $data_types['class']);
  array_push($types_inf, $type);
}
//TODO:define('TYPES', $types_inf);
?>
