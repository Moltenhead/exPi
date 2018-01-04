<?php
  require_once(htmlspecialchars($_SERVER['DOCUMENT_ROOT']) . '/wole/design/strc/globals.php');
  require_once(objPath('strc', 'db_connexion.php'));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

  <head>
      <?php
        require_once(objPath('strc', 'head.php'));
      ?>
  </head>

  <body>
    <nav id="main_nav" class="part_horiz_cover">
      <?php
        include_once(objPath('strc', 'mainNav.php'));
      ?>
    </nav>

    <main>
      <div class="">

      </div>

    </main>

    <footer>
      <?php
        include_once(objPath('strc', 'footer.php'));
      ?>
    </footer>
  </body>
</html>
