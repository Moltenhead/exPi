<?php error_reporting(E_ALL);
//url auto-prefixing
if (preg_match('#/ex[pP]{1}i/#', $_SERVER['PHP_SELF'])) {
  define(
    'PREFIX',
    substr($_SERVER['PHP_SELF'], 0 , stripos($_SERVER['PHP_SELF'], '/exPi/') + 5)
  );
} else {
  define('PREFIX', '');
}
require_once(htmlspecialchars($_SERVER['DOCUMENT_ROOT']) . PREFIX . '/design/strc/globals.php');
require_once(objPath('strc', 'db_connexion.php'));
require_once(objPath('strc', 'global_queries.php'));

require_once(objPath('control', 'core.php'));
?>
