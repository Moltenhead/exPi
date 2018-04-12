<?php
class BoardXp extends Xp
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
    <a
      href="<?php echo HTTPH .
        'affichage_experience/xp=' .
        $this->uuid; ?>"
      class="xp_wrapper <?php echo $this->class[rand(0,count($this->class)-1)];//TODO: replace by it's true type when removing the placeholders ?>"
      title="en savoir + sur <?php echo $this->title; ?>">
      <div class="true_box">
        <div class="xp flex_row">
          <div class="img_wrapper noselect">
            <img class="xp_img" src="<?php echo ($this->img != null) ?
              objPath('up_img', $this->img) :
              objPath('img', 'bitmap/exPi_logo_placeholder.png'); ?>" alt="<?php echo $this->img_alt; ?>">
          </div>
          <div class="xp_informations flex_column stretched">
            <article>
              <h3 class="txt_centered"><?php echo $this->title; ?></h3>
              <p class="txt_justified"><?php echo $this->short_description; ?></p>
            </article>
            <div class="txt_right">
              <p>
                édité le
                <span><?php echo $this->date_update; ?></span>
              </p>
            </div>
          </div>
        </div>
        <nav class="flex_column hovering_nav">
        <?php if (isConnected()) {
          if (in_array($interest101->xps, $this->uuid)) {?>
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
