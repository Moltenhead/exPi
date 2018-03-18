<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta rel="canonical" href="">

<title>exPi</title>
<link rel="icon" type="image/png" href="<?php echo objPath('img', 'bitmap/exPi_logo_favicon.png') ?>" />

<meta name="description" content="exPi" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
  //CSS linking
  styLink(array (
    'style',
    'normalize',
    'generale',
    'colorizer',
    'css_mainNav',
    'css_secondNav',
    'css_magic_hat',
    'css_de_board',
    'css_footer',
    $csself
    )
  );

  /*If can't access to JQ CDN then load server contained JQ version
  * TODO: make it functional
  */
  $handle = curl_init("https://code.jquery.com/jquery-3.2.1.min.js");
  curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

  /* Get the HTML or whatever is linked in $url. */
  $response = curl_exec($handle);

  /* Check for 404 (file not found). */
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  if($httpCode == 404) {
    scriptLink('jquery-3.2.1.min');
  } else {
    echo '<script
    			  src="https://code.jquery.com/jquery-3.2.1.min.js"
    			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    			  crossorigin="anonymous"></script>';
  }

  curl_close($handle);

  //JS linking
  scriptLink('main');
?>
