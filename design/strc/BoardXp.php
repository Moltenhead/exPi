<?php
class BoardXp extends Xp
{
  public function print()
  {
    echo '<div class="slide flex_row">
      <figure class="slide_representation">
        <a href="' . $this->_href . '">
          <figcaption>' . $this->_alt . '</figcaption>
        </a>
        <img src="' . $this->_href . '" alt="' . $this->_alt . '">
      </figure>
      <div class="slide_informations">
        <article class="slide_description">
          ' . $this->_short_description . '
        </article>
        <nav class="flex_row">
          <a href="' . objPath('mod', '') . '">&Ccedil;a m\'intéresse</a>
          <a href="' . HTTPH . '?wh=4&xp=' . $this->_uuid . '">En savoir +</a>
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
