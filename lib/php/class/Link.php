<?php
class Link
{
  private $id;
  private $title;
  private $href;
  private $class;
  private $order_value;

  public function __construct($id, $title, $href, $class, $order_value)
  {
    $this->id = $id;
    $this->title = $title;
    //regex to transform the link if PHP readable
    if (preg_match('/constant\(\'([\w_]+)\'\)/', $href)) {
      $re = '/.*?constant\(\'([\w_]+)\'\).*/';
      preg_match($re, $href, $matches);
      $this->href = constant($matches[1]);

      $re = '/.*?(?!\()\'([\w =?_\-:\/]+)\'(?!\))$/';
      $this->href .= (preg_match($re, $href, $matches)) ?
        $matches[1] :
        '';
    } else {
      $this->href = $href;
    }

    $this->class = $class;
    $this->oreder_value = $order_value;
  }

  public function __get($property)
  {
    if (property_exists($this, $this->$property)) {
      return $this->$property;
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'invalid parameter, got ' . $property .
        ' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'],
        E_USER_NOTICE);
    }
  }

  public function show($target)
  {
    $true_target = (isset($target) && $target != null) ? $target : '_self';
    echo '<a href="' . $this->href .
      '" target="' . $true_target . '">' .
      $this->title .
      '</a>';
  }
}
?>
