<?php
class SlideXp extends Xp
{
  public function print()
  { ?>
    <div class="slide_wrapper flex_row">
      <div class="slide_representation noselect">
        <img src="<?php echo ($this->_href != null) ?
          objPath('up_img', $this->_href) :
          objPath('img', 'bitmap/exPi_logo_placeholder.png'); ?>" alt="<?php echo $this->_alt; ?>">
      </div>
      <div class="slide_informations flex_column stretched">
        <article class="slide_description">
          <h1><?php echo$this->_title; ?></h1>
          <p class="txt_justified"><?php echo $this->_short_description; ?></p>
        </article>
        <nav class="flex_row stretched">
          <?php if (isConnected()) {
            if (in_array($interest101->get('xps'), $this->_id)) {?>
            <a href="<?php echo objPath('mod', '') ?>" title="$Ccedil;a m'intéresse">
              +
            </a>
            <?php } else { ?>
            <a href="<?php echo objPath('mod', '') ?>" title="$Ccedil;a ne m'intéresse plus">
              -
            </a>
            <?php }
          } ?>
          <a href="<?php echo HTTPH .
          '?wh=affichage_experience&xp=' .
          $this->_uuid; ?>">En savoir +</a>
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
