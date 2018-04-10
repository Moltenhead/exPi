<div class="main_wrapper flex_column aligned">
<?php
include_once(objPath('control', 'secondNav_sections.php'));
?>
</div>
<button
  class="picto micro_picto activable parent_transmissive"
  title="<?php echo $where_inf->nav_description ?>
  ">
  <?php echo file_get_contents(objPath('svg', 'arrow.svg')); ?>
</button>
