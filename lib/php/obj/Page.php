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
  private $db;

  //$db where pages_nav are stocked on first argument
  public function __construct($db, $id, $name, $class, $nav_sections, $nav_descr)
  {
    $this->db = $db;
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
        $where_str .
          ' ORDER BY order_value DESC'
      );

    while ($data_navs = $que_navs->fetch(PDO::FETCH_ASSOC)) {
      array_push(
        $this->nav_sections,
        array(
          'title' => $data_navs['title'],
          'class' => htmlspecialchars($data_navs['class']),
          'order_value' => (int) $data_navs['order_value'],
          'description' => htmlspecialchars($data_navs['description']),
          'links_ids' => htmlspecialchars($data_navs['pages_link_ids']),
        )
      );
    }

    $this->nav_description = $nav_descr;
    $this->httph = HTTPH . $class;
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
    if (array_key_exists($select, $this->nav_sections[$index])) {
      return $this->nav_sections[$index][$select];
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'parameter error : ' . $select .
        ' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'],
        E_USER_NOTICE
      );
    }
  }

  public function showNav($index, $target)
  {
    echo
      '<div class="nav_section ' . $this->getNav($index, 'class') . '">
        <h3 class="section_header">' . $this->getNav($index, 'title') . '</h3>
        <ul class="link_box">';
        $links = new LinksCollection(
          $this->db, $this->nav_sections[$index]['links_ids']);
        $links->showAll($target);
        echo '</ul>
      </div>';
  }
}
?>
