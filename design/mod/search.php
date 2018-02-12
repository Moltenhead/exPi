<?php
$que_xp = $db->query(
  'SELECT *
    FROM experiences e
      INNER JOIN types t
      ON e.type_id = t.id
        WHERE MATCH(t.id) AGAINST("' . $type . '") AND
            MATCH()
            AGAINST("' . $search . '")
          LIMIT 3'
);

$slides = array();
while ($data_xp = $que_xp->fetch(PDO::ASSOC)) {
  array_push($slides, new Slide);
  $slides[count($slides) - 1]->init();
}
?>
