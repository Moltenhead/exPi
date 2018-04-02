<div class="xp_representation flex_column spaced">
  <figure class="noselect">
    <figcaption>Image de représentation :</figcaption>
    <img <?php echo (isset($_POST['img']['tmp_name'])) ?
      'src="' . $_POST['img']['tmp_name'] . '"' :
      ''; ?> alt="">
  </figure>
  <div class="img_infos flex_column end_placed">
    <input
      type="file"
      name="img"
      class="noselect"
      <?php
      echo (isset($_POST['img'])) ?
        'value="' . $_POST['img'] . '"' :
        ''; ?>>
    <input
      type="text"
      name="img_alt"
      placeholder="Déscription courte de l'image"
      <?php
      echo (isset($_POST['img_alt'])) ?
        'value="' . $_POST['img_alt'] . '"' :
        ''; ?>">
  </div>
</div>
<div class="xp_contents_wrapper yverflow">
  <div class="xp_contents flex_column stretched">
    <input type="text" name="title" placeholder="Titre de l'expérience">
    <div class="radio_wrapper flex_column noselect">
      <label for="type_radio_selector">Type d'expérience :</label>
      <div id="type_radio_selector" class="radio_selector flex_row">
        <?php for($i = 0; $i < count($types_inf); $i++) { ?>
        <div class="option_wrapper flex_row aligned aligned">
          <input
            id="radio_<?php echo $types_inf[$i]->get('class'); ?>"
            type="radio"
            name="type"
            value="<?php echo $types_inf[$i]->get('id'); ?>"
            <?php
            if (
              isset($_POST['type']) &&
              $_POST['type'] != 0 &&
              !empty($_POST['type'])
            ) {
              echo ($i === (int) $_POST['type']) ?
                ' checked="true"' :
                '';
            } else {
              echo ($i === 0) ?
                ' checked="true"' :
                '';
            } ?>>
          <label for="radio_<?php echo $types_inf[$i]->get('class'); ?>">
            <?php echo $types_inf[$i]->get('name'); ?>
          </label>
        </div>
        <?php } ?>
      </div>
    </div>
    <textarea
      name="short_description"
      rows="8"
      cols="80"
      placeholder="Description courte"><?php
      echo (isset($_POST['short_description'])) ?
        $_POST['short_description'] :
        ''; ?></textarea>
    <textarea
      name="long_description"
      rows="8"
      cols="80"
      placeholder="Description complète"><?php
      echo (isset($_POST['long_description'])) ?
        $_POST['long_description'] :
        ''; ?></textarea>
    <div class="categories_wrapper flex_column">
      <label for="input_categoreis" class="noselect">Catégories :</label>
      <input
        id="input_themes"
        type="text"
        name="themes"
        placeholder="Ajoutez un thème d'expérience"
        <?php echo (isset($_POST['themes'])) ?
          'value="' . $_POST['themes'] . '"' :
          ''; ?>>
    </div>
  </div>
</div>
