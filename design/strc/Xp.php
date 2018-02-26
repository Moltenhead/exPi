<?php
class Xp
{
  protected $_uuid;
  protected $_title;
  protected $_href;
  protected $_alt;
  protected $_short_description;
  protected $_date_maj;

  public function __construct($uuid, $title, $href, $alt, $short_descr, $date_update)
  {
    $this->_uuid = $uuid;
    $this->_title = $title;
    $this->_href = $href;
    $this->_alt = $alt;
    $this->_short_description = $short_descr;
    $this->_date_update = $date_update;
  }

  public function get($select)
  {
    switch ($select) {
      case 'id' :
        return $this->_uuid;
        break;
      case 'title' :
        return $this->_title;
        break;
      case 'alt' :
        return $this->_alt;
        break;
      case 'short_descr' :
        return $this->_short_description;
        break;
      case 'date_update' :
        return $this->_date_update;
        break;
    }
  }
}
?>
