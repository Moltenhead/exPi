<?php
/* ------------------------ OPTION SELECT -----------------------*/
//stylesheets extension
$style_ext = '.css';
//'http' or 'https'
$protocole_select = 'http'; // TODO: a éditer lors du passage HTTPS

$max_default_query_rows = 100;

$default_page = 1;
//how much xps within the de_board
$pagination = 24;
//how much slides within the magic_hat (meant to be a multiple of 3)
$slides_number = 9;

$xp_per_page = $pagination + $slides_number;

require_once($_SERVER['DOCUMENT_ROOT'] . PREFIX . '/design/strc/router.php');

/* --------------------- TOOLS ---------------------*/
require_once(WORK_ROOT . 'routing.php');
require_once(objPath('work', 'autoloader.php'));
require_once(objPath('work', 'linker.php'));
require_once(objPath('work', 'testers.php'));

/* ------------------- cURL --------------------*/
function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

/* --------------------- PAGINATION MANAGEMENT --------------------- */
$page;
(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] != null) ?
  $page = (int) $_GET['page'] :
  $page = $default_page;
;
?>
