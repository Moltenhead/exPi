<div id="magic_hat" class="slider_wrapper">
<?php
require_once(objPath('mod', 'search.php'));
$que_xp = $db->query('SELECT *
                        FROM experiences e
                          INNER JOIN types t
                          ON e.type_id = t.id
                            WHERE MATCH(t.id) AGAINST("' . $type . '") AND
                                MATCH()
                                AGAINST("' . $search . '")
                              LIMIT 3
                    ');

while ($data_xp = $que_xp->fetch(PDO::ASSOC)) {
  printSlide($data_xp);
}
?>
  <div class="slide flex_row">
    <figure class="slide_representation">
      <a href="<?php echo $xp_inf->get('href'); ?>"><figcaption><?php echo $xp_inf->get('title'); ?></figcaption></a>
      <img src="<?php echo $xp_inf->get('img'); ?>" alt="<?php echo $xp_inf->get('alt'); ?>">
    </figure>
    <div class="slide_informations">
      <article class="slide_description">
        <?php echo $xp_inf->get('short_descr'); ?>
      </article>
      <nav class="flex_row">
        <a href="<?php objPath('mod', ''); ?>">&Ccedil;a m'intéresse</a><!-- TODO: replace by a button with ajax db treatments on click -->
        <?php $xp_inf->print_a(); ?>
      </nav>
      <mark>
        <strong>&Eacute;dité le </strong>
        <span><?php echo $xp_inf->get('date_edit'); ?></span>
      </mark>
    </div>
  </div>
<?php } ?>
</div>
