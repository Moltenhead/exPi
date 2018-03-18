<div class="main_wrapper flex_column spaced aligned">
<?php
include_once(objPath('control', 'secondNav_sections.php'));
?>
</div>
<button class="picto micro_picto activable parent_transmissive" title="<?php echo $where_inf->get('nav_descr') ?>">
  <?php echo file_get_contents(objPath('img', 'svg/arrow.svg')); ?>
</button>
