<div class="main_wrapper flex_row aligned">
  <a class="home_link logo no_depth flex_row centered" href="<?php echo HTTPH; ?>" title="exPi">
      <?php curl(objPath('img', 'svg/exPi_logo_v8.svg')); ?>
  </a>
  <div id="global_nav" class="flex_row spaced aligned">
    <form
      class="search_bar flex_row spaced"
      action="<?php echo HTTPH . '?wh=accueil' ?>"
      method="POST"
      >
      <input type="text" name="search" placeholder="Envie de ...">
      <div class="select_wrapper activable"> <!-- TODO: besoin d'une foncton js pour "focusable" - bug avec activable -->
        <select name="type">
          <option value="0" selected>Tout</option>
          <?php for($i = 0; $i < count($types_inf); $i++) { ?>
          <option value="<?php echo $types_inf[$i]->get('class'); ?>" class="micro_picto"><?php echo $types_inf[$i]->get('name'); ?></option>
          <?php } ?>
        </select>
      </div>
      <input type="submit" value="et je trouve !">
    </form>
  </div>
  <div id="account_nav" class="connection_box flex_row spaced aligned">
    <?php if (session_status() !== PHP_SESSION_NONE) { ?>
    <button id="profile_options_button" class="activable" title="options de compte">
      <?php echo curl(objPath('img', 'svg/menu_arrow.svg')); ?>
    </button>
    <a href="" id="profile" title="accéder à votre profil">
      <img class="micro_picto avatar" src="" alt="">
    </a>
    <?php } else { ?>
      <div id="connect_nav">
        <a href="">je participe</a>
      </div>
    <?php } ?>
  </div>
</div>
