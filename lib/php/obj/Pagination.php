<?php
class Pagination
{
  protected $_max_page;
  protected $_actual_page;

  private $pdo = $db;
  private function __construct()
  {
    $this->_actual_page = (isset($_GET['page']) && $_GET['page'] != null) ?
      (int) $_GET['page'] :
      1;

    $que_nb_lines = $pdo->query(
      'SELECT COUNT(id) AS nb
        FROM experiences' .
      (isset($_POST['search']) AND !empty($_POST['search'])) ?
          ' WHERE MATCH(
            e.title,
            e.short_description,
            e.long_description)
              AGAINST(' . $db->quote($_POST['search']) . ')' :
          ' LIMIT 100';
    );
    $data_nb_lines = $que_nb_lines->fetch(PDO::FETCH_COLUMN, 0);

    $this->_max_page = $data_nb_lines / ($pagination + $slides_number);
  }
}
?>
