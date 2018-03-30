<?php
class Xp
{
  protected $uuid;
  protected $title;
  protected $type;
  protected $type_class;
  protected $img;
  protected $img_alt;
  protected $short_description;
  protected $long_description;
  protected $themes;
  protected $date_create;
  protected $date_update;

  /*test utilitary
  * TODO: delete after database population
  */
  protected $class = array(
    '',
    'voir',
    'ecouter',
    'gouter',
    'sortir',
    'rencontrer',
    'transpirer',
    'jouer'
  );

  public function __construct(
    $uuid,
    $title,
    $type,
    $img,
    $img_alt,
    $short_descr,
    $long_descr,
    $themes,
    $date_create,
    $date_update)
  {
    $this->uuid = $uuid;
    $this->title = $title;
    $this->type = $type;
    $this->img = $img;
    $this->img_alt = $img_alt;
    $this->short_description = $short_descr;
    $this->short_description = $long_descr;
    $this->themes = $themes;
    $this->date_create = $date_create;
    $this->date_update = $date_update;
  }

  public function __get($property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'invalid parameter, got ' . $property .
        ' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'],
        E_USER_NOTICE
      );
    }
  }

  public function __set($asked, $value)
  {
    if (property_exists($this, $asked)) {
      $this->$asked = $value;
    } else if (method_exists($this, $asked)) {
      $this->$asked;
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'invalid parameter or method, got ' . $asked .
        ' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'],
        E_USER_NOTICE
      );
    }

    return $this;
  }
}
?>
