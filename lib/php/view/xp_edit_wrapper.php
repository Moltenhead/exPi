<div id="xp_wrapper" class="flex_column aligned">
  <?php
  echo (isset($_POST['error'])) ?
    '<p class="error_notice flex_row aligned" style="height: 5%">' . $_POST['error'] . '</p>' :
    '';
  ?>
  <form
    id="xp_datas"
    action="<?php echo HTTPH . '?mod=xp_crud&from=' . $where_inf->class ?>"
    method="post"
    class="flex_column"<?php echo (isset($_POST['error'])) ?
      ' style="height: 95%;"' :
      ''; ?>>
    <div class="main_wrapper flex_row">
      <?php
      require_once(objPath('control', 'xp_edit.php'));
      ?>
    </div>
    <nav class="nav_wrapper flex_row end_placed">
      <input type="submit" value="Ajouter l'expérience">
    </nav>
  </form>
</div>
