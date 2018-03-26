<?php
class BoardXp extends Xp
{
  public function print()
  { ?>
    <a
      href="<?php echo HTTPH .
        '?wh=affichage_experience&xp=' .
        $this->_uuid; ?>"
      class="xp_wrapper <?php echo $this->_class[rand(0,count($this->_class)-1)];//TODO: replace by it's true type when removing the placeholders ?>"
      title="en savoir + sur <?php echo $this->_title; ?>">
      <div class="true_box">
        <div class="xp flex_row">
          <div class="img_wrapper noselect">
            <img class="xp_img" src="<?php echo ($this->_href != null) ?
              objPath('up_img', $this->_href) :
              objPath('img', 'bitmap/exPi_logo_placeholder.png'); ?>" alt="<?php echo $this->_alt; ?>">
          </div>
          <div class="xp_informations flex_column stretched">
            <article>
              <h3 class="txt_centered"><?php echo $this->_title; ?></h3>
              <p class="txt_justified"><?php echo $this->_short_description; ?></p>
            </article>
            <div class="txt_right">
              <p>
                édité le
                <span><?php echo $this->_date_update; ?></span>
              </p>
            </div>
          </div>
        </div>
        <nav class="flex_column hovering_nav">
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
        </nav>
      </div>
    </a>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
