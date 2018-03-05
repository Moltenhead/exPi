<?php
class Pagination
{
  private $_max_display = 5;//maximum displayed indexes
  //properties declarations
  private $_first_index;
  private $_max_page;
  private $_actual_page;
  private $_max_xp;

  /*ask for a nb of rows returned by a query on construct
  * and max nb of xp on one page
  */
  public function __construct($xp_per_page, $nb_rows)
  {
    $this->_max_xp = ($xp_per_page);
    $this->_actual_page = (isset($_GET['page']) && $_GET['page'] != null) ?
      (int) $_GET['page'] :
      1;//if no get_page then page is the first

    $this->_max_page = $nb_rows / $this->_max_xp;

    $this->_first_index = ($this->_actual_page <= round($this->_max_display / 2)) ?
      1:
      $this->_actual_page - round($this->_max_display / 2);
  }

  public function print($where_inf, $request)
  { ?>
    <form action="?wh=<?php echo $where_inf->get('class'); ?>"
      method="POST"
      class="pagination_wrapper"
    >
      <input type="hidden" name="search" value="<?php echo $request['search']; ?>">
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
