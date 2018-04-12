<?php
class SlideXp extends Xp
{
  public function __construct($uuid, $title, $img, $img_alt, $short_descr,$created_at, $date_update)
  {
    $this->uuid = $uuid;
    $this->title = $title;
    $this->img = $img;
    $this->img_alt = $img_alt;
    $this->short_description = $short_descr;
    $this->date_create = $created_at;
    $this->date_update = $date_update;
  }

  public function print()
  { ?>
    <div class="slide_wrapper flex_row">
      <div class="slide_representation noselect">
        <img src="<?php echo ($this->img != null) ?
          objPath('up_img', $this->img) :
          objPath('img', 'bitmap/exPi_logo_placeholder.png'); ?>" alt="<?php echo $this->img_alt; ?>">
      </div>
      <div class="slide_informations flex_column stretched">
        <article class="slide_description">
          <h1><?php echo$this->title; ?></h1>
          <p class="txt_justified"><?php echo $this->short_description; ?></p>
        </article>
        <nav class="flex_row stretched">
          <?php if (isConnected()) {
            if (in_array($interest101->get('xps'), $this->id)) {?>
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
          'affichage_experience/xp=' .
          $this->uuid; ?>">En savoir +</a>
        </nav>
        <p class="txt_right">
          édité le
          <span><?php echo $this->date_update; ?></span>
        </p>
      </div>
    </div>
  <?php }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
