<?php
class Pagination
{
  private $_max_display = 5;//maximum displayed links to pages

  protected $_max_page;
  protected $_actual_page;

  private $pdo = $db;
  private function __construct()
  {
    $this->_actual_page = (isset($_GET['page']) && $_GET['page'] != null) ?
      (int) $_GET['page'] :
      1;

    $data_nb_lines = $que_nb_lines->fetch(PDO::FETCH_COLUMN, 0);
    $this->_max_page = $data_nb_lines / ($pagination + $slides_number);
  }

  public function print()
  { ?>
    <form action="?wh<?php echo htmlspecialchars($_GET['wh']); ?>" method="POST" class="pagination_wrapper">
      <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
      <?php for ($i = 0; $i < $this->_max_display; $i++) { ?>
      <input type="submit" name="page" value="<?php echo $i; ?>">
      <?php } ?>
    </nav>
  <?php }
}
?>
