<?php
/* -------------------- PAGE MANAGEMENT ---------------------*/
$page;
if (isset($_GET['page'])) {
  $page = escape_string($_GET['page']);
} else {
  $page = 'accueil';
}

$que_page = $db->query('SELECT id,
                               page_title AS title,
                               page_class AS class,
                               nav_first_section_title AS first_title,
                               nav_first_section_class AS first_class,
                               nav_second_section_title AS second_title,
                               nav_second_section_class AS second_class
                          FROM pages
                            WHERE page_class = \'' . $page . '\'');

while ($data_page = $que_page->fetch(PDO::FETCH_ASSOC)) {}
$que_page->closeCursor();

$page_inf = new Page;
$page_inf->init(
  $data_page['id'],
  $data_page['title'],
  $data_page['class']
);
$page_inf->push_section($data_page['first_title'], $data_page['first_class']);
$page_inf->push_section($data_page['second_title'], $data_page['second_class']);
?>
