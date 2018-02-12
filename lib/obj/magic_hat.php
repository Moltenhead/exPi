<div id="magic_hat" class="slider_wrapper">
<?php
require_once(objPath('mod', 'search.php'));

while ($data_xp = $que_xp->fetch(PDO::ASSOC)) {
  printSlide($data_xp);
}
?>

<?php } ?>
</div>
