<div class="main_wrapper flex_row v_align">
  <a class="home_link logo no_depth" href="" title="exPi">
      <?php echo file_get_contents(objPath('img', 'svg/exPi_logo_v8.svg')); ?>
  </a>
  <div id="global_nav" class="flex_row spaced">
    <form class="search_bar flex_row spaced" action="" method="">
      <input type="text" placeholder="Envie de ...">
      <input type="submit" value="et je trouve !">
    </form>
    <nav class="link_box flex_row spaced">
      <a href="">August</a>
      <a href="">Bertholt</a>
      <a href="">Camille</a>
      <a href="">Diana</a>
    </nav>
  </div>
  <div id="account_nav" class="connection_box flex_row spaced v_align">
    <?php if (session_status() !== PHP_SESSION_NONE) { ?>
    <button id="profile_options_button" class="activable" title="options de compte">
      <?php echo file_get_contents(objPath('img', 'svg/menu_arrow.svg')); ?>
    </button>
    <a href="" id="profile" title="accéder à votre profil">
      <img class="micro_picto avatar" src="" alt="">
    </a>
    <?php } else { ?>
      <a href="">s'enregistrer</a>
      <a href="">se connecter</a>
    <?php } ?>
  </div>
</div>
