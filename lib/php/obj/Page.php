<?php
class Page
{
  private $_id;
  private $_name;
  private $_class;
  private $_nav_sections = array();
  private $_nav_description;

  private $_httph;

  public function __construct($id, $name, $class, $nav_descr)
  {
    $this->_id = $id;
    $this->_name = $name;
    $this->_class = $class;
    $this->_nav_description = $nav_descr;
    $this->_httph = HTTPH . '?wh=' . $class;
  }

  public function push_section($title, $class)
  {
    array_push($this->_nav_sections, array('title' => $title, 'class' => $class));
  }

  public function get($select)
  {
    switch ($select) {
      case 'id' :
        return $this->_id;
        break;
      case 'name' :
        return $this->_name;
        break;
      case 'class' :
        return $this->_class;
        break;
      case 'nav_descr' :
        return $this->_nav_description;
        break;
      case 'httph' :
        return $this->_httph;
        break;
      default :
        trigger_error(
          'invalid parameter, expecting \'id\' OR \'name\' OR \'class\'',
          E_USER_ERROR
        );
        break;
    }
  }

  public function get_section($index, $select)
  {
    $index = $index || 0;
    if ($select == 'title' || $select == 'class') {
      return $this->_nav_sections[$index][$select];
    } else {
      return 'parameter error';
    }
  }

  public function has_mutiple()
  {
    if (count($this->_nav_sections) > 1) {
      return true;
    } else {
      return false;
    }
  }
}
?>
