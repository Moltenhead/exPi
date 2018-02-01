<div class="main_wrapper flex_column centered aligned">
<?php //TODO: insert needed tables for the following code to work
//section titles query
$que_nav_titles = $db->prepare('SELECT nav_first_section_title AS 1st_section,
                                       nav_second_section_title AS 2nd_section
                                  FROM pages
                                    WHERE id = ?
                                ');
//links query
$que_nav_links = $db->prepare('SELECT section_id, title, href
                                  FROM nav_links
                                    WHERE page_id = ?
                                ');

//checking if there is a page_id for the active page
if (isset($page_id)) {
  $que_nav_tiltes->execute(array($page_id));
  $que_nav_links->execute(array($page_id));

  $menu = new Menu;
  $data_nav_titles = $req_nav_tiltes->fetch(PDO::ASSOC);
  $menu->init_title($data_nav_titles['1st_section']);
  //if
  if (!empty($data_nav_titles['2nd_section'])) {
    $menu->init_title($data_nav_titles['2nd_section']);
  }

  while ($data_nav_links = $req_nav_links->fetch(PDO::ASSOC)) {
    $menu->push_link($data_nav_links['section_id'], $data_nav_links['title'], $data_nav_links['href']);
  }
?>
  <h4 class="section_header"><?php ?></h4>
  <ul class="link_box">
  <?php ?>
  </ul>
  <?php if (count($menu->sections) > 1) { ?>
  <h4 class="section_header"><?php ?></h4>
  <ul class="link_box">
  <?php ?>
  </ul>
  <?php } ?>
<?php } else { ?>
  <h4 class="section_header">Mes intérêts</h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
  <h4 class="section_header">Intérêts collectifs</h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
<?php } ?>
</div>
<button type="button">
  <!-- TODO: ajouter le svg en forme de flèche -->
</button>
