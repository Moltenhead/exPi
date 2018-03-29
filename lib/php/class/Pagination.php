<?php
class Pagination
{
  private $_max_display = 5;//maximum displayed indexes
  //properties declarations
  private $_first_index;
  private $_max_page;
  private $_actual_page;
  private $_max_xp;
  private $_true_display;

  /*ask for a nb of rows returned by a query on construct
  * and max nb of xp on one page
  */
  public function __construct($xp_per_page, $nb_rows)
  {
    $this->_max_xp = $xp_per_page;
    $this->_actual_page = (isset($_GET['page']) && $_GET['page'] != null) ?
      (int) $_GET['page'] :
      1;//if no get_page then page is the first

    $this->_max_page = ceil($nb_rows / $this->_max_xp);

    $this->_first_index = ($this->_actual_page <= round($this->_max_display / 2)) ?
      1:
      $this->_actual_page - round($this->_max_display / 2) + 1;
  }

  public function show($select)
  {
    switch ($select) {
      case 'max_display' :
        return $this->_max_display;
        break;
      case 'first_index' :
        return $this->_first_index;
        break;
      case 'max_page' :
        return $this->_max_page;
        break;
      case 'actual_page' :
        return $this->_actual_page;
        break;
      case 'max_xp' :
        return $this->_max_xp;
        break;
      default :
        trigger_error(
          'wrong parameter, expecting \'max_display\'' .
            ' OR \'first_index\'' .
            ' OR \'max_page\'' .
            ' OR \'actual_page\'' .
            ' OR \'max_xp\'',
          E_USER_ERROR
        );
    }
  }

  public function print($where_inf, $request)
  {
    global $HTTPH;// httphost + uri from design/strc/globals.php

    $print = '<div class="flex_row aligned">
      <label>pages :</label>
      <form action="' . $where_inf->httph .
      '" method="POST" class="pagination_wrapper">';
    if (isset($_POST['search']) && $_POST['search'] != null) {
      $print .= '<input type="hidden" name="search" value="' .
        $_POST['search'] .
        '">';
    }

    for (
        $i = $this->_first_index;
        $i < $this->_first_index + $this->_max_display && $i <= $this->_max_page;
        $i++
    ) {
      $print .=  '<input type="button" value="' . $i . '" class="page_button';
      $print .= ($i === $this->_actual_page) ?
        ' actual' :
        '';
      $print .= '">';
    }
    $print .= '</form>
      </div>';

    echo $print;
  }
}
?>
