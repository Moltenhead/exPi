<?php
class TypesCollection
{
  public function __construct(Type $type)
  {
    $type->add('TypesCollection');
  }

  public function pushType($id, $name, $class)
  {
    $type->init($id, $name, $class);

    array_push($this->_types_list, $type);
  }

  public function getType($index, $select)
  {
    $index = $index || 0;
    $select = $select || 'name';
    $this->_types_list[$index]->get($select);
  }
}
?>
