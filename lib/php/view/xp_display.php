<div id="xp_display_wrapper">
  <h1 class="xp_title"><?php echo $xp->title; ?></h1>
  <figure class="xp_representation">
    <img src="<?php echo objPath('up_img', $xp->img); ?>" alt="<?php echo $xp->img_alt; ?>">
    <figcaption><?php echo $xp->short_description; ?></figcaption>
  </figure>
  <div class="geo"><!--TODO: add geoloc API --></div>
  <div class="textual"><?php echo $xp->long_description; ?></div>
</div>
