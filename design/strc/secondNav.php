<div class="main_wrapper flex_column centered aligned">
<?php
$req_second_nav = $bdd->prepare('SELECT p.title,
                                        p.first_section_title AS 1st_section,
                                        p.second_section_title AS 2nd_section,
                                        nl.section_id,
                                        nl.title,
                                        nl.href
                                  FROM pages AS p
                                    INNER JOIN nav_links AS nl
                                    ON nl.id_page = p.id
                                      WHERE p.id = ?
                                ');
if (isset($page_id)) {
  $req_second_nav->execute(array($page_id))?>
  <h4 class="interest_header"><?php $second_nav_data[] ?></h4>
  <ul class="link_box">
  <?php ?>
  </ul>
  <?php if (/*hasDualMenu*/) { ?>
  <h4 class="interest_header"><?php ?></h4>
  <ul class="link_box">
  <?php ?>
  </ul>
  <?php } ?>
<?php }
} else { ?>
  <h4 class="interest_header">Mes intérêts</h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
  <h4 class="interest_header">Intérêts collectifs</h4>
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
