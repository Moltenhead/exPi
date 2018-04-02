<?php
class XpCU extends Xp
{
  public function print()
  {
    global $types_inf;

    $html = '<div class="xp_representation flex_column spaced">' .
      '<figure class="noselect">' .
        '<figcaption>Image de représentation :</figcaption>' .
        '<img ' .
          'src="' . $this->img . '"' .
          ' alt="' . $this->img_alt . '">' .
      '</figure>' .
      '<div class="img_infos flex_column end_placed">' .
        '<input ' .
          'type="file"' .
          ' name="img"' .
          ' class="noselect"' .
          ' values="' . $this->img . '"' .
        '<input ' .
          'type="text"' .
          ' name="img_alt"' .
          ' placeholder="Déscription courte de l\'image"' .
          ' value="' . $this->img_alt . '">' .
      '</div>' .
    '</div>' .
    '<div class="xp_contents_wrapper yverflow">' .
      '<div class="xp_contents flex_column stretched">' .
        '<input type="text" name="title" placeholder="Titre de l\'expérience">' .
        '<div class="radio_wrapper flex_column noselect">' .
          '<label for="type_radio_selector">Type d\'expérience :</label>' .
          '<div id="type_radio_selector" class="radio_selector flex_row">';

    $types_html = '';
    for($i = 0; $i < count($types_inf); $i++) {
            $types_html .= '<div class="option_wrapper flex_row aligned aligned">' .
              '<input ' .
                'id="radio_' . $types_inf[$i]->class . '"' .
                ' type="radio"' .
                ' name="type"' .
                ' value="' . $types_inf[$i]->id . '"';
            $types_html .= ($i === (int) $this->type) ?
              ' checked="true"' :
              '';
            $types_html .= '>' .
              '<label for="radio_' . $types_inf[$i]->class . '">' .
                $types_inf[$i]->name .
              '</label>' .
            '</div>';
    }

    $html .= $types_html .
          '</div>' .
        '</div>' .
        '<textarea
          name="short_description"
          rows="8"
          cols="80"
          placeholder="Description courte">' .
          $this->short_description .
          '</textarea>' .
        '<textarea
          name="long_description"
          rows="8"
          cols="80"
          placeholder="Description complète">' .
          $this->long_description .
          '</textarea>' .
        '<div class="categories_wrapper flex_column">' .
          '<label for="input_categories" class="noselect">Catégories :</label>' .
          '<input ' .
            'id="input_themes"' .
            ' type="text"' .
            ' name="themes"' .
            ' placeholder="Ajoutez un thème d\'expérience"' .
            ' value="' . $this->themes . '">' .
        '</div>' .
      '</div>' .
    '</div>';

    echo $html;
  }
}
?>
