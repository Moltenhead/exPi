<?php
class Link
{
  private $_title;
  private $_href;
  private $_class;

  public function __construct($title, $href, $class)
  {
    $this->_title = $title;
    $this->_href = $href;
    $this->_class = $class;
  }

  public function get($select)
  {
    if ($select == 'title') {
      return $this->_title;
    } else if ($select == 'href') {
      return $this->_href;
    } else if ($select == 'class') {
      return $this->_class;
    } else {
      trigger_error(
        'invalid parameter, expecting \'title\' OR \'href\' OR \'class\'',
        E_USER_ERROR
      );
    }
  }
}
?>
