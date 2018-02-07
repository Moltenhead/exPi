<div class="main_wrapper flex_column centered aligned">
<?php //TODO: insert needed tables for the following code to work

// checking if there is a page_id for the active page
if (!empty($page_inf->get('id'))) {
  $id = $page_inf->get('id');
  //important informations query
  $que_nav_inf = $db->query('SELECT COUNT(*),
                                    MAX(section_id)
                                FROM nav_links
                                  WHERE page_id = ' . $id
                           );
  //usable informations query
  $que_nav_links = $db->query('SELECT section_id,
                                      title,
                                      class,
                                      href
                                  FROM nav_links
                                    WHERE page_id = ' . $id
                             );

  //stocking first query datas
  $data_nav_inf = $que_nav_inf->fetch(PDO::FETCH_NUM);
  $que_nav_inf->closeCursor();

  $nb_lines = $data_nav_inf[0];
  if ($nb_lines >= 1) {
    /* Creating an array of LinksCollection that contains as much LinkCollection
    * as it is needed
    */
    $l_collections = array();
    $max_section = $data_nav_inf[1];
    for ($i = 0; $i < $max_section; $i++) {
      array_push($l_collections, new LinksCollection);
    }

    //push all links to the associated index within $l_collections
    while ($data_nav_links = $que_nav_links->fetch(PDO::FETCH_ASSOC)) {
      $link = new Link;
      $link->init(
        $data_nav_links['title'],
        $data_nav_links['class'],
        $data_nav_links['href']
      );
      $l_collections[$data_nav_links['section_id'] - 1]->push($link);
    }
    $que_nav_links->closeCursor();
?>
  <h4 class="section_header"><?php echo $page_inf->get_section(0, 'title'); ?></h4>
  <ul class="link_box">
    <?php for ($i = 0; $i < count($l_collections[0]); $i++) { ?>
    <li><?php @$l_collections[0]->print_a($i); // @ = stfu error operator ?></li>
    <?php } ?>
  </ul>
    <?php if ($page_inf->has_mutiple()) { ?>
  <h4 class="section_header"><?php echo $page_inf->get_section(1, 'title'); ?></h4>
  <ul class="link_box">
    <?php ?>
  </ul>
    <?php }
  } else { ?>
  <h4 class="section_header">No links</h4>
  <?php }
}else { ?>
  <h4 class="section_header">No page index</h4>
<?php } ?>
</div>
<button class="picto micro_picto">
  <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
</button>
