<?php
class BoardXp extends Xp
{
  public function print()
  { ?>
    <div class="xp_wrapper">
      <a class="xp flex_row">
        <img src="<?php $this->_href ?>" alt="<?php echo $this->_alt ?>">
        <div class="xp_informations">
          <article class="slide_description">
            <h6><?php echo $this->_title; ?></h6>
            <?php echo $this->_short_description; ?>
          </article>
          <mark>
            <strong>&Eacute;dité le </strong>
            <span><?php echo $this->_date_update; ?></span>
          </mark>
        </div>
      </a>
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
        <a href="<?php echo HTTPH; ?>?wh=4&xp=<?php echo $this->_uuid ?>">En savoir +</a>
      </nav>
    </div>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
