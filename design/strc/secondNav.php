<div class="main_wrapper flex_column centered aligned">
<?php //TODO: insert needed tables for the following code to work
//section titles query
//links query
$que_nav_links = $db->prepare('SELECT COUNT(*) AS nb, section_id, title, class, href
                                  FROM nav_links
                                    WHERE page_id = ?
                              ');

//checking if there is a page_id for the active page
if (!empty($page_inf->get('id'))) {
  $que_nav_links->execute(array($page_inf->get('id')));
  $data_nav_links = $que_nav_links->fetchAll(PDO::FETCH_COLUMN, 0);
  $data_nav_links = $data_nav_links[0];
  $que_nav_links->closeCursor();

  $l_collections = array();
?>
  <h4 class="section_header"><?php echo $page_inf->get_section(0, 'title'); ?></h4>
  <ul class="link_box">
  <?php if ($nb_lines >= 1) {
    while ($data_nav_links = $que_nav_links->fetch(PDO::FETCH_ASSOC);) { ?>
    <li><?php// $links[0]->print_link(i); i++; ?></li>
  <?php } else { ?>
    <li>no links </li>
  <?php } ?>
  </ul>
  <?php if ($page_inf->has_mutiple()) { ?>
  <h4 class="section_header"><?php echo $page_inf->get_section(1, 'title'); ?></h4>
  <ul class="link_box">
  <?php ?>
  </ul>
  <?php } ?>
<?php } else { ?>
  <h4 class="section_header">No page index</h4>
<?php } ?>
</div>
<button class="picto micro_picto">
  <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
</button>
