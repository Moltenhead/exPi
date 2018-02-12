<?php
class Slide
{
  private $_id;
  private $_title;
  private $_img;
  private $_alt;
  private $_short_description;
  private $_date_maj;

  public function init($id, $title, $img, $alt, $short_descr, $date_update)
  {
    $this->_id = $id;
    $this->_title = $title;
    $this->_img = $img;
    $this->_alt = $alt;
    $this->_short_description = $short_descr;
    $this->_date_update = $date_update;
  }

  public function get($select)
  {
    switch ($select) {
      case 'id' :
        return $this->_id;
        break;
      case 'title' :
        return $this->_title;
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

  public function print()
  {
    echo '<div class="slide flex_row">
      <figure class="slide_representation">
        <a href="' . $this->_href . '">
          <figcaption>' . $this->_title . '</figcaption>
        </a>
        <img src="' . $this->_img . '" alt="' . $this->_alt . '">
      </figure>
      <div class="slide_informations">
        <article class="slide_description">
          ' . $this->_short_description . '
        </article>
        <nav class="flex_row">
          <a href="' . objPath('mod', '') . '">&Ccedil;a m\'intéresse</a>
          <a href="?page=4&xp=' . $this->_id . '">En savoir +</a>
        </nav>
        <mark>
          <strong>&Eacute;dité le </strong>
          <span>' . $this->_date_update . '</span>
        </mark>
      </div>
    </div>';
  }
  //TODO: replace "Ca m'intéresse" by a button with ajax db treatments on click
}
?>
