<?php
$img = ROOT . "uploads/img/" . $xp->img;
$img_path = ($xp->img != NULL && file_exists($img)) ?
  objPath('up_img', $xp->img) :
  objPath('img', 'bitmap/exPi_logo_placeholder.png');

$lat = rand(-85000,85000)/1000;
$lng = rand(-180000,180000)/1000;
?>
<input
  type="hidden"
  class="geo_pos lat"
  value="<?php echo $lat ?>">
<input
  type="hidden"
  class="geo_pos lng"
  value="<?php echo $lng ?>">

<form
  id="to_edition"
  action="<?php echo HTTPH; ?>edition-experience/xp=<?php echo $xp->uuid; ?>"
  method="post">
  <input type="submit" value="&Eacute;diter">
</form>

<div
  id="xp_display_wrapper"
  <?php echo (!is_null($xp->type_class)) ?
    'class="' . $xp->type_class . '"' :
    ''; ?>>
  <div id="xp_header" class="flex_column centered aligned">
    <h1 id="xp_title"><?php echo $xp->title; ?></h1>
  </div>
  <div id="xp_wrapper" class="flex_row">
    <figure class="xp_representation">
      <img
        src="<?php echo $img_path; ?>"
        alt="<?php echo $xp->img_alt; ?>">
      <div class="infos">
        <figcaption class="xp_type"><h1><?php echo "#" . $xp->type; ?></h1></figcaption>
        <figcaption class="xp_short_descr"><?php echo $xp->short_description; ?></figcaption>
      </div>
    </figure>
    <div class="xp_content_wrapper">
      <div class="xp_content left_bordered">
        <?php echo $xp->long_description; ?>
      </div>
      <div id="geo" class="flex_row left_bordered">
        <div class="localisation flex_column">
          <h2>Localisation:</h2>
          <div class="localisation_wrapper flex_column">
            <div class="flex_row">
              <label for="[object Object]" class="flex_row stretched nowrap">
                <strong>Nom du lieu</strong>
                <!--span>:</span-->
              </label>
              <mark></mark>
            </div>
            <div class="flex_row">
              <label for="[object Object]" class="flex_row stretched nowrap">
                <em></em>
                <!--span>:</span-->
              </label>
              <em><?php echo $lat . ":" . $lng; ?></em>
            </div>
            <div class="flex_row">
              <label for="[object Object]" class="flex_row stretched nowrap">
                <strong>Description</strong>
                <!--span>:</span-->
              </label>
              <mark></mark>
            </div>
          </div>
        </div>
        <div class="map_wrapper">
          <div id="map">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
