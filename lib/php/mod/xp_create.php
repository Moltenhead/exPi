<?php
/*TODO: implement duplicate handling
*/

$error_codes = array();
$xp = new Xp(null, null, null, null, null, null, null, null, null, null);

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

$insert_string = 'INSERT INTO experiences (' .
  'uuid, ' .
  'title, ' .
  'type_id, ' .
  'short_description, ' .
  'long_description, ' .
  'themes, ' .
  'created_at';

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

        $que_last_uuid = $db->query('SELECT MAX(id) AS max_id, uuid ' .
          'FROM experiences_images ' .
          'WHERE id = max_id');
        $img_uuid = $que_maxId->fetch(PDO::FETCH_COLUMN, 1);
        $insert_string .= ', img_uuid) ' .
          'VALUES(UUID(), ' .
          $xp->title . ', ' .
          $xp->type .', ' .
          $xp->short_description . ', ' .
          $xp->long_description . ', ' .
          'NOW(), ' .
          $img_uuid . ')';
      }
    }
  }
} else {
  $insert_string .= ') ' .
    'VALUES(UUID(), ' .
    $db->quote($xp->title) . ', ' .
    $db->quote($xp->type) .', ' .
    $db->quote($xp->short_description) . ', ' .
    $db->quote($xp->long_description) . ', ' .
    $db->quote($xp->themes) . ', ' .
    'NOW())';
}

if($db->exec($insert_string)) {
  $db->exec($insert_string);

  $xp->uuid = $db->query(
    'SELECT uuid
      FROM experiences
        WHERE id = ' . $db->lastInsertId())->fetch(PDO::FETCH_COLUMN, 0);

  echo '<form id="validity" action="' . HTTPH . 'edition-experience/xp-' . $xp->uuid .
    '" methode="post">' .
      '<input type="hidden" name="validity" value="true">' .
    '</form>' .
    '<script>
      window.onload = function () {
        document.getElementById(\'validity\').submit();
      }
    </script>';
} else {
  echo '<form id="validity" action="' . HTTPH . 'creation-experience" methode="post">' .
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
