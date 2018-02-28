<div id="magic_hat" class="slider_wrapper">
  <button class="picto big_picto" title="">
    <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
  </button>
  <div class="slider_container flex_row">
  <?php
  forEach($slides AS $slide) {
    $slide->print();
  }
  ?>
  </div>
  <button class="picto big_picto" title="">
    <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
  </button>
</div>
