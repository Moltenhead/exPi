<?php
class SlideXp extends Xp
{
  public function print()
  { ?>
    <div class="slide_wrapper flex_row">
      <figure class="slide_representation">
        <a href="<?php echo $this->_href; ?>">
          <figcaption><?php echo $this->_alt; ?></figcaption>
        </a>
        <img src="<?php echo ($this->_href != null) ?
          objPath('up_img', $this->_href) :
          objPath('img', 'bitmap/exPi_logo_placeholder.png'); ?>" alt="<?php echo $this->_alt; ?>">
      </figure>
      <div class="slide_informations flex_column stretched">
        <article class="slide_description">
          <h1><?php echo$this->_title; ?></h1>
          <p class="txt_justified"><?php echo $this->_short_description; ?></p>
        </article>
        <nav class="flex_row stretched">
          <a href="<?php echo objPath('mod', ''); ?>">&Ccedil;a m'intéresse</a>
          <a href="<?php echo HTTPH; ?>?wh=4&xp=<?php echo $this->_uuid; ?>">En savoir +</a>
        </nav>
        <p class="txt_right">
          édité le
          <span><?php echo $this->_date_update; ?></span>
        </p>
      </div>
    </div>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
