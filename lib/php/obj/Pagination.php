<?php
class Pagination
{
  private $_max_display = 5;//maximum displayed indexes
  //properties declarations
  private $_first_index;
  private $_max_page;
  private $_actual_page;

  //ask for a nb of rows returned by a query on construct
  private function __construct($nb_rows)
  {
    $this->_actual_page = (isset($_GET['page']) && $_GET['page'] != null) ?
      (int) $_GET['page'] :
      1;//if no get_page then page is the first

    $this->_max_page = $nb_rows / ($pagination + $slides_number);

    $this->$_first_index = ($this->_actual_page <= round($this->_max_display / 2)) ?
      1:
      $this->_actual_page - round($this->_max_display / 2);
  }

  public function print()
  { ?>
    <form action="?wh<?php echo htmlspecialchars($_GET['wh']); ?>"
      method="POST"
      class="pagination_wrapper"
    >
      <input type="hidden" name="search" value="<?php echo $_POST['search']; ?>">
      <?php for (
        $i = $this->_first_index;
        $i < ($this->_first_index + $this->_max_display);
        $i++
      ) { ?>
      <input type="submit" name="page" value="<?php
        echo $i;
        echo ($i === $this->_actual_page) ?
          '" class="actual' :
          '';
      ?>
      ">
      <?php } ?>
    </form>
  <?php }
}
?>
