<div id="xp_edition_wrapper" class="xp_cu flex_column aligned slider_wrapper up_nav no_view_adjust">
  <nav class="slider_nav flex_row stretched">
    <button class="slider_button go_left">&Eacute;diter</button>
    <button class="slider_button go_right">Charte</button>
  </nav>
  <div class="slider_view">
    <div class="slider_container flex_row nowrap">
      <div class="slide_wrapper">
        <?php include_once(objPath('view', 'xp_edit.php')); ?>
      </div>
      <div class="slide_wrapper flex_row centered yverflow">
        <?php include_once(objPath('view', 'xp_howto.php')); ?>
      </div>
    </div>
  </div>
</div>
