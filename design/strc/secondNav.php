<div class="main_wrapper flex_column aligned">
<?php if (isset($page)) { // TODO: links management through mySQL queries
  if (in_array($page, $interest_menu)) { ?>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
<?php } else if (in_array($page, $profile_menu)) { ?>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
<?php }
} else { ?>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
  <h4 class="interest_header"></h4>
  <ul class="link_box">
    <li>Auguste</li>
    <li>Bertholt</li>
    <li>Calvin</li>
    <li>Dito</li>
    <li>Fasma</li>
    <li>Geralt</li>
  </ul>
<?php } ?>
</div>
<button type="button">
  <!-- TODO: ajouter le svg en forme de flèche -->
</button>
