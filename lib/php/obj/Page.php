<?php
class Page
{
  private $id;
  private $name;
  private $class;
  private $order_value;
  private $nav_sections = array();
  private $nav_description;

  private $httph;

  //$db where pages_nav are stocked on first argument
  public function __construct($db, $id, $name, $class, $nav_sections, $nav_descr)
  {
    $this->id = $id;
    $this->name = $name;
    $this->class = $class;

    $navs = preg_split('/[-]+/', $nav_sections);
    $where_str;
    if (count($navs) > 0) {
      $where_str = ' WHERE id = ' . (int) $navs[0];
      for ($i = 1; $i < count($navs); $i++) {
        $where_str .= ' OR id = ' . (int) $navs[$i];
      }
    } else {
      $where_str = '';
    }

    $que_navs = $db->query(
      'SELECT
        title,
        class,
        order_value,
        description,
        pages_link_ids
        FROM pages_navs' .
        $where_str
      );

    while ($data_navs = $que_navs->fetch(PDO::FETCH_ASSOC)) {
      array_push($this->nav_sections, array(
          'title' => htmlspecialchars($data_navs['title']),
          'class' => htmlspecialchars($data_navs['class']),
          'order_value' => htmlspecialchars($data_navs['order_value']),
          'description' => htmlspecialchars($data_navs['description']),
          'links_ids' => htmlspecialchars($data_navs['pages_link_ids']),
        )
      );
    }

    $this->_nav_description = $nav_descr;
    $this->_httph = HTTPH . '?wh=' . $class;
  }

  public function __get($property) {
    if (property_exists($this, $property)) {
        return $this->$property;
    } else {
      $trace = debug_backtrace();
      trigger_error(
          'Undefined property via __get() : ' . $property .
          ' in ' . $trace[0]['file'] .
          ' line ' . $trace[0]['line'],
          E_USER_NOTICE);
      return null;
    }
  }

  public function hasNavSections()
  {
    if (count($this->nav_sections) >= 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function getNav($index, $select)
  {
    $index = $index || 0;
    //$select = $select || 'title';
    return ($this->nav_sections[$index][$select]) ?
       $this->nav_sections[$index][$select] :
       trigger_error('parameter error', E_USER_ERROR);
  }

  public function showNav($index)
  {
    $index = $index || 0;
    echo
      '<div class="nav_section">
        <h3 class="section_header">' . $this->getNav($index, 'title') . '</h3>
        <ul class="link_box">' .
        //TODO: add links auto implementation
        '</ul>
      </div>';
  }
}
?>
