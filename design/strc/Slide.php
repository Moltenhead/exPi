<?php
class Slide
{
  private $_title;
  private $_href;
  private $_img;
  private $_alt;
  private $_short_description;
  private $_date_maj;

  public function init($title, $href, $img, $alt, $short_descr, $date_update)
  {
    $this->_title = $title;
    $this->_href = $href;
    $this->_img = $img;
    $this->_alt = $alt;
    $this->_short_description = $short_descr;
    $this->_date_update = $date_update;
  }

  public function get($select)
  {
    switch ($select) {
      case 'title' :
        return $this->_title;
        break;
      case 'href' :
        return $this->_href;
        break;
      case 'img' :
        return $this->_img;
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
