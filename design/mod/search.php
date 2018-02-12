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
?>
