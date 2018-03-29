<?php
/* ------------------- CLASSES AUTOLOADER --------------------*/
function __autoload($class_name)
{
  include objPath('class', $class_name . '.php');
}
?>
