<div class="main_wrapper flex_row aligned">
  <a class="home_link logo no_depth" href="" title="exPi">
      <?php echo file_get_contents(objPath('img', 'svg/exPi_logo_v8.svg')); ?>
  </a>
  <div id="global_nav" class="flex_row spaced aligned">
    <form class="search_bar flex_row spaced" action="" method="">
      <input type="text" name="search" placeholder="Envie de ...">
      <div class="select_wrapper activable"> <!-- TODO: besoin d'une foncton js pour "focusable" - bug avec activable -->
        <select name="type">
          <option value="" selected>Tout</option>
          <option value="" class="micro_picto">Voir</option>
          <option value="" class="micro_picto">&Eacute;couter</option>
          <option value="" class="micro_picto">Goûter</option>
          <option value="" class="micro_picto">Rencontrer</option>
          <option value="" class="micro_picto">Sortir</option>
        </select>
      </div>
      <input type="submit" value="et je trouve !">
    </form>
  </div>
  <div id="account_nav" class="connection_box flex_row spaced aligned">
    <?php if (session_status() !== PHP_SESSION_NONE) { ?>
    <button id="profile_options_button" class="activable" title="options de compte">
      <?php echo file_get_contents(objPath('img', 'svg/menu_arrow.svg')); ?>
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
