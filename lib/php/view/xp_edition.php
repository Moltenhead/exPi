<?php
require_once(objPath('mod', 'xp_get.php'));

if (!empty($_POST['title'])) {
  foreach ($_POST as $key => $value) {
    if (array_key_exists($key, $xp)) {
      $xp->key = $value;
    }
  }
}

$img = ROOT . "uploads/img/" . $xp->img;

$img_path = (file_exists($img)) ?
  @objPath('up_img', $xp->img) :
  objPath('img', 'bitmap/exPi_logo_placeholder.png');
?>

<div
  id="xp_edition_wrapper"
  class=
    "xp_cu
    flex_column
    aligned
    slider_wrapper
    up_nav
    no_view_adjust
    <?php echo $xp->type_class; ?>">
  <nav class="slider_nav flex_row stretched">
    <button class="slider_button go_left">&Eacute;diter</button>
    <button class="slider_button go_right">Charte</button>
  </nav>
  <div class="slider_view">
    <div class="slider_container flex_row nowrap">
      <div class="slide_wrapper">
        <?php
        require_once(objPath('view', 'xp_edit_wrapper.php'));
        ?>
      </div>
      <div class="slide_wrapper flex_row centered yverflow">
        <?php
        include_once(objPath('view', 'xp_howto.php'));
        ?>
      </div>
    </div>
  </div>
</div>
