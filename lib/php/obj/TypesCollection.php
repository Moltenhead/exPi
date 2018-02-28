<?php
class TypesCollection
{
  private $_types_list = array();

  public function pushType($id, $name, $class)
  {
    $type = new Type($id, $name, $class);
    array_push($this->_types_list, $type);
  }

  public function get($index, $select)
  {
    $index = $index || 0;
    $select = $select || 'name';
    $this->_types_list[$index]->get($select);
  }
}
?>
