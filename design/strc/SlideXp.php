<?php
class SlideXp extends Xp
{
  public function print()
  { ?>
    <div class="slide_wrapper">
      <div class="flex_row slide_content">
        <figure class="slide_representation">
          <a href="<?php echo $this->_href; ?>">
            <figcaption><?php echo $this->_alt; ?></figcaption>
          </a>
          <img src="<?php echo $this->_href; ?>" alt="<?php echo $this->_alt; ?>">
        </figure>
        <div class="slide_informations">
          <article class="slide_description">
            <?php echo $this->_short_description; ?>
          </article>
          <mark>
            <strong>&Eacute;dité le </strong>
            <span><?php echo $this->_date_update; ?></span>
          </mark>
        </div>
      </div>
      <nav class="flex_column">
        <a href="<?php echo objPath('mod', ''); ?>">&Ccedil;a m'intéresse</a>
        <a href="<?php echo HTTPH; ?>?wh=4&xp=<?php echo $this->_uuid; ?>">En savoir +</a>
      </nav>
    </div>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
