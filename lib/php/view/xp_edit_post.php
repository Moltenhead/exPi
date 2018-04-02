<?php
  $xp = new XpCU(
    htmlspecialchars($_GET['xp']),
    htmlspecialchars($_POST['title']),
    (int) $_POST['type'],
    null,
    htmlspecialchars($_FILES['img']),
    htmlspecialchars($_POST['img_alt']),
    htmlspecialchars($_POST['short_description']),
    htmlspecialchars($_POST['long_description']),
    htmlspecialchars($_POST['themes']),
    null,
    null
  );

  $xp->print();
?>
