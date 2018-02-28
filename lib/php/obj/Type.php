<?php
class Type
{
  private $_id;
  private $_name;
  private $_class;

  public function __construct($id, $name, $class)
  {
    $this->_id = $id;
    $this->_name = $name;
    $this->_class = $class;
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
      default :
        trigger_error('invalid parameter, unexpected \'' . $select .
        '\', expecting \'name\' OR \'class\' only', E_USER_ERROR);
    }
  }
}
?>
