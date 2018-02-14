<?php
class TypesCollection
{
  private $_types_list = array();

  public function pushType($name, $class)
  {
    $type = new Type;
    $type->init($name, $class);

    array_push($type, $this->_types_list);
  }

  public function get($index, $select)
  {
    $index = $index || 0;
    $select = $select || 'name';
    $this->_types_list[$index]->get($select);
  }
}
?>
