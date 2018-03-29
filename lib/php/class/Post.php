<?php
class Post
{
  private $_url;
  private $_data;
  private $_options;

  /*$data await an array equivalent to $_POST super global structure
  * ex :
  *  $data = array('key1' => 'value1', 'key2' => 'value2');
  */
  public function __construct($httph, $data)
  {
    $this->_url = $httph;
    $this->_data = $data;

    // use key 'http' even if you send the request to https://...
    $this->_options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($this->_options);
    $result = file_get_contents($this->_url, false, $context);
    if ($result === FALSE) {
      trigger_error(
        '',
        E_USER_ERROR
      );
    }

    //var_dump($result);
  }
}
?>
