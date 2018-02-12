<?php
class Page
{
  private $_id;
  private $_name;
  private $_class;
  private $_nav_sections = array();
  private $_nav_description;

  public function init($id, $name, $class, $nav_descr)
  {
    $this->_id = $id;
    $this->_name = $name;
    $this->_class = $class;
    $this->_nav_description = $nav_descr;
  }

  public function push_section($title, $class)
  {
    array_push($this->_nav_sections, array('title' => $title, 'class' => $class));
  }

  public function get($select)
  {
    if ($select == 'id') {
      return $this->_id;
    } else if ($select == 'name') {
      return $this->_name;
    } else if ($select == 'class') {
      return $this->_class;
    } else if ($select == 'nav_descr') {
      return $this->_nav_description;
    } else {
      trigger_error(
        'invalid parameter, expecting \'id\' OR \'name\' OR \'class\'',
        E_USER_ERROR
      );
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
