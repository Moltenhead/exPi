<div id="magic_wrapper" class="flex_row">
  <button class="picto big_picto" title="expérience précédente">
    <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
  </button>
  <div id="magic_hat" class="slider_wrapper flex_row">
    <div class="slider_container flex_row">
    <?php
    $slide_nb = 0;
    forEach($slides AS $slide) {
      if ($slide_nb === 0 || ($slide_nb % 3) === 0) { ?>
        <div class="magic_carpet flex_row">
      <?php }

      $slide->print();
      $slide_nb++;

      if (($slide_nb % 3) === 0) { ?>
        </div>
      <?php }
    }

    if (($slide_nb % 3) !== 0) { ?>
      </div>
    <?php } ?>
    </div>
  </div>
  <button class="picto big_picto" title="expérience suivante">
    <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
  </button>
</div>
