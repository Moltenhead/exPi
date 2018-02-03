<?php
/* -------------------- PAGE MANAGEMENT ---------------------*/
$page;
if (isset($_GET['page'])) {
  $page = htmlspecialchars($_GET['page']);
  $que_page = $db->query('SELECT ');
} else {
  $page = 0;
}

$page_id;
if(isset($_GET['page'])) {

}
?>
