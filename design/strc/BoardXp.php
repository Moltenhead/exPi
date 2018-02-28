<?php
class BoardXp extends Xp
{
  public function print()
  { ?>
    <a class="xp_wrapper">
      <div class="true_box">
        <div class="xp flex_row">
          <img class="xp_img" src="<?php $this->_href ?>" alt="<?php echo $this->_alt ?>">
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
          <?php } ?>
        <?php } ?>
        </nav>
      </div>
    </a>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
