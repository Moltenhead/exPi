<div id="xp_wrapper">
  <form
    id="xp_datas"
    action="<?php echo objPath('control', 'xp_crud.php') . '?from=' . $where_inf->class ?>"
    method="post"
    class="flex_column">
    <div class="main_wrapper flex_row">
      <div class="xp_representation flex_column spaced">
        <figure class="noselect">
          <figcaption></figcaption>
          <img src="" alt="">
        </figure>
        <div class="img_infos flex_column end_placed">
          <input type="file" name="img" class="noselect">
          <input type="text" name="img_alt" placeholder="Déscription courte de l'image">
        </div>
      </div>
      <div class="xp_contents_wrapper yverflow">
        <div class="xp_contents flex_column stretched">
          <input type="text" name="title" placeholder="Titre de l'expérience">
          <div class="radio_wrapper flex_column noselect">
            <label for="type_radio_selector">Type d'expérience :</label>
            <div id="type_radio_selector" class="radio_selector flex_row">
              <div class="option_wrapper flex_row aligned">
                <input id="radio_tout" type="radio" name="type" value="tout" checked>
                <label for="radio_tout">Tout</label>
              </div>
              <?php for($i = 0; $i < count($types_inf); $i++) { ?>
              <div class="option_wrapper flex_row aligned aligned">
                <input
                  id="radio_<?php echo $types_inf[$i]->get('class'); ?>"
                  type="radio"
                  name="type"
                  value="<?php echo $types_inf[$i]->get('class'); ?>">
                <label for="radio_<?php echo $types_inf[$i]->get('class'); ?>">
                  <?php echo $types_inf[$i]->get('name'); ?>
                </label>
              </div>
              <?php } ?>
            </div>
          </div>
          <textarea name="short_description" rows="8" cols="80" placeholder="Déscription courte"></textarea>
          <textarea name="long_description" rows="8" cols="80" placeholder="Déscription complète"></textarea>
          <div class="categories_wrapper flex_column">
            <label for="input_categoreis" class="noselect">Catégories :</label>
            <input id="input_categories" type="text" name="categories" placeholder="Ajoutez une catégorie">
          </div>
        </div>
      </div>
    </div>
    <nav class="nav_wrapper flex_row end_placed">
      <input type="submit" value="Ajouter l'expérience">
    </nav>
  </form>
</div>
