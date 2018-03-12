<?php error_reporting(E_ALL);
  //url auto-prefixing
  (preg_match('#/ex[pP]{1}i/#', $_SERVER['PHP_SELF'])) ?
    define(
      'PREFIX',
      substr($_SERVER['PHP_SELF'], 0 , stripos($_SERVER['PHP_SELF'], '/exPi/') + 6)
    ) :
    define('PREFIX', '');
  require_once(htmlspecialchars($_SERVER['DOCUMENT_ROOT']) . PREFIX . 'design/strc/globals.php');
  require_once(objPath('strc', 'db_connexion.php'));
  require_once(objPath('strc', 'global_queries.php'));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

  <head>
      <?php
        require_once(objPath('strc', 'head.php'));
      ?>
  </head>

  <body>
    <div id="background_sticker" class="logo big_logo">
      <?php
        echo file_get_contents(objPath('img', 'svg/exPi_logo_v8.svg'));
      ?>
    </div>

    <nav id="main_nav" class="flex_row v_align">
      <?php
        include_once(objPath('strc', 'mainNav.php'));
      ?>
    </nav>
    <nav id="second_nav" class="">
      <?php
        include_once(objPath('strc', 'secondNav.php'));
      ?>
    </nav>

    <main>
      <div class="main_wrapper flex_column aligned">
      <?php
        include_once(objPath('strc', 'core.php'));
      ?>
      </div>
    </main>

    <footer>
      <?php
        include_once(objPath('strc', 'footer.php'));
      ?>
    </footer>
  </body>
</html>
