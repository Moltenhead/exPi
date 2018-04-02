<?php
/*TODO: implement duplicate handling
*/

$error_codes = array();
$xp = new Xp(
  htmlspecialchars($_POST['uuid']),
  null,
  null,
  null,
  null,
  null,
  null,
  null,
  null,
  null,
  null);

if (isset($_POST['title']) && $_POST['title'] != null) {
  $xp->title = htmlspecialchars($_POST['title']);
} else {
  array_push($error_codes, 0);
}

if (isset($_POST['type']) && $_POST['type'] != null) {
  $xp->type = (int) $_POST['type'];
} else {
  array_push($error_codes, 1);
}

if (isset($_POST['short_description']) && $_POST['short_description'] != null) {
  $xp->short_description = htmlspecialchars($_POST['short_description']);
} else {
  array_push($error_codes, 2);
}

if (isset($_POST['long_description']) && $_POST['long_description'] != null) {
  $xp->long_description = htmlspecialchars($_POST['long_description']);
} else {
  array_push($error_codes, 3);
}

if (isset($_POST['themes']) && $_POST['themes'] != null) {
  $xp->themes = htmlspecialchars($_POST['themes']);
} else {
  array_push($error_codes, 4);
}

if (isset($_FILES['img']) && $_FILES['img'] != null) {
  if (isset($_FILES['img_alt']) && $_FILES['img_alt'] != null) {
    $xp->img = $_FILES['img'];
    $xp->img_alt = $_FILES['img_alt'];
  } else {
    array_push($error_codes, 5);
  }
}

$error_full_string = '';
if (count($error_codes) > 0) {
  for ($i = 0; $i < count($error_codes); $i++) {
    $error_string = 'Il manque ';
    switch ($error_codes[$i]) {
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
    $error_full_string .= ($i === 0) ?
      $error_string :
      ' \\ ' . $error_string;
  }

  echo '<form id="error" action="' . HTTPH . 'creation-experience" method="post">' .
      '<input type="hidden" name="error" value="' . $error_full_string . '">' .
      '<input type="hidden" name="title" value="' . $xp->title . '">' .
      '<input type="hidden" name="type" value="' . $xp->type . '">' .
      '<input type="hidden" name="short_description" value="' . $xp->short_description . '">' .
      '<input type="hidden" name="long_description" value="' . $xp->long_description . '">' .
      '<input type="hidden" name="themes" value="' . $xp->themes . '">' .
      '<input type="file" name="img" value="' . $xp->img . '" style="display: none">' .
      '<input type="hidden" name="img_alt" value="' . $xp->img_alt . '">' .
    '</form>' .
  '<script>
  window.onload = function () {
    document.getElementById(\'error\').submit();
  }
  </script>';
  return;
}

$update_string = 'UPDATE experiences SET ' .
  'title = ' . $db->quote($xp->title) . ', ' .
  'type_id = ' . $db->quote($xp->type) . ', ' .
  'short_description = ' . $db->quote($xp->short_description) . ', ' .
  'long_description = ' . $db->quote($xp->long_description) . ', ' .
  'themes = ' . $db->quote($xp->themes) . ', ' .
  'update_last = NOW()';

//TODO: image insertion only if image doesn't already exists
if ($xp->img != null && $xp->img_alt != null) {
  if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0) {
    if ($_FILES['img']['size'] <= 1000000) {
      $fileinfos = pathinfo($_FILES['img']['name']);
      $extension_upload = $fileinfos['extension'];
      $allowed_extensions = array(
        'jpg',
        'jpeg',
        'gif',
        'png');
      if (in_array($extension_upload, $allowed_extensions)) {
        $img_path = ROOT . '/uploads/img/' . basename($_FILES['img']['name']);
        $img_name = substr($img_path, strrpos($img_path, '/'), strlen($img_path) - 1);
        $img_title = substr($img_name, 0, strrpos($img_name, '.'));
        $img_slug = strtolower(preg_replace('/[ -]/', '_', $img_title));
        move_uploaded_file(
          $_FILES['img']['tmp_name'],
          $img_path);
        $db->query(
          'INSERT INTO experiences_images (uuid, href, title, class, alt)' .
          'VALUES(UUID(), ' .
          $img_name . ', ' .
          $img_title . ', ' .
          $img_slug . ', ' .
          $xp->img_alt );

        $img_uuid = $db->query('SELECT uuid ' .
          'FROM experiences_images ' .
          'WHERE id = ' . $db->lastInsertId())->fetch(PDO::FETCH_COLUMN, 0);
        $update_string .= ', img_uuid = ' . $db->quote($img_uuid);
      }
    }
  }
}

$update_string .= ' WHERE uuid = ' . $db->quote($xp->uuid);

if($db->exec($update_string)) {
  $db->exec($update_string);

  echo '<form id="validity" action="' . HTTPH . 'edition-experience/xp=' . $xp->uuid .
    '" method="post">' .
      '<input type="hidden" name="validity" value="true">' .
    '</form>' .
    '<script>
      window.onload = function () {
        document.getElementById(\'validity\').submit();
      }
    </script>';
} else {
  echo '<form id="validity" action="' . HTTPH . 'edition-experience" method="post">' .
      '<input type="hidden" name="validity" value="false">' .
      '<input type="hidden" name="title" value="' . $xp->title . '">' .
      '<input type="hidden" name="type" value="' . $xp->type . '">' .
      '<input type="hidden" name="short_description" value="' . $xp->short_description . '">' .
      '<input type="hidden" name="long_description" value="' . $xp->long_description . '">' .
      '<input type="hidden" name="themes" value="' . $xp->themes . '">' .
      '<input type="file" name="img" value="' . $xp->img . '" style="display: none">' .
      '<input type="hidden" name="img_alt" value="' . $xp->img_alt . '">' .
    '</form>' .
    '<script>
      window.onload = function () {
        document.getElementById(\'validity\').submit();
      }
    </script>';
}
?>
