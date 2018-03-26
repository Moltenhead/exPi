<?php
$error_code = array();
$xp = new Xp(null, null, null, null, null, null, null, null);

if (isset($_POST['title']) && $_POST['title'] != null) {
  $xp->title = htmlspecialchars($_POST['title']);
} else {
  array_push($error_code, 0);
}

if (isset($_POST['type']) && $_POST['type'] != null) {
  $xp->type = htmlspecialchars($_POST['type']);
} else {
  array_push($error_code, 1);
}

if (isset($_POST['short_description']) && $_POST['short_description'] != null) {
  $xp->short_description = htmlspecialchars($_POST['short_description']);
} else {
  array_push($error_code, 2);
}

if (isset($_POST['long_description']) && $_POST['long_description'] != null) {
  $xp->long_description = htmlspecialchars($_POST['long_description']);
} else {
  array_push($error_code, 3);
}

if (isset($_POST['categories']) && $_POST['categories'] != null) {
  $xp->categories = htmlspecialchars($_POST['categories']);
} else {
  array_push($error_code, 4);
}

if (isset($_FILES['img']) && $_FILES['img'] != null) {
  if (isset($_FILES['img_alt']) && $_FILES['img_alt'] != null) {
    $xp->img = $_FILES['img'];
    $xp->img_alt = $_FILES['img_alt'];
  } else {
    array_push($error_code, 5);
  }
}var_dump($xp);

if (count($error_code) > 0) {
  $error_string = 'Il manque ';
  switch (max($error_code)) {
    case 0:
      $error_string .= 'un titre';
      break;
    case 1:
      $error_string .= 'un type';
      break;
    case 2:
      $error_string .= 'une description rapide';
      break;
    case 3:
      $error_string .= 'une description complète';
      break;
    case 4:
      $error_string .= 'une catégorie';
      break;
    case 5:
      $error_string .= 'une description d\'image';
      break;
    default:
      $error_string .= 'rien';
      break;
  }

  $error_string .= ' à l\'expérience';

  echo '<form id="error" action="' . HTTPH . '?wh=creation_experience" methode="post">' .
      '<input type="hidden" name="error" value="' . $error_string . '">' .
      '<input type="hidden" name="title" value="' . $xp->title . '">' .
      '<input type="hidden" name="type" value="' . $xp->type . '">' .
      '<input type="hidden" name="short_description" value="' . $xp->short_description . '">' .
      '<input type="hidden" name="long_description" value="' . $xp->long_description . '">' .
      '<input type="hidden" name="categories" value="' . $xp->categories . '">' .
      '<input type="hidden" name="img" value="' . $xp->img . '">' .
      '<input type="hidden" name="img_alt" value="' . $xp->img_alt . '">' .
    '</form>' .
    '<script>document.getElementById(error).submit;</script>';
}

if($db->exec($que_string)) {
  $db->exec($que_string);
  echo '<form id="validity" action="' . HTTPH . '?wh=edition_experience&xp=' . $uui .
    '" methode="post">' .
      '<input type="hidden" name="validity" value="true">' .
    '</form>' .
    '<script>document.getElementById(validity).submit;</script>';
} else {
  echo '<form id="validity" action="' . HTTPH . '?wh=creation_experience" methode="post">' .
      '<input type="hidden" name="validity" value="false">' .
    '</form>' .
    '<script>document.getElementById(validity).submit;</script>';
}
?>
