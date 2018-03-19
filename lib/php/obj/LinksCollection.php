<?php
class LinksCollection
{
  private $links = array();

  //awaiting "-" separated string within $where
  public function __construct($db, $where)
  {
    $ids = preg_split('/[-]+/', $where);
    $where_str = ' WHERE id = ' . (int) $ids[0];
    for ($i = 1; $i < count($ids); $i++) {
      $where_str .= ' OR id = ' . (int) $ids[$i];
    }

    $que_links = $db->query(
      'SELECT title, class, href, order_value
        FROM pages_links' .
        $where_str .
          ' ORDER BY order_value DESC'
    );

    while ($data_links = $que_links->fetch(PDO::FETCH_ASSOC)) {
      array_push($this->links,
        new Link(
          $data_links['title'],
          $data_links['href'],
          $data_links['class'],
          $data_links['order_value']
        )
      );
    }
  }

  public function push($title, $href, $class, $order_value)
  {
    array_push($this->links, new Link($tilte, $href, $class, $order_value));
  }

  public function show($index, $target)
  {
    $this->links[$index]->show($target);
  }

  public function showAll($target)
  {
    foreach ($this->links AS $link) {
      $link->show($target);
    }
  }
}
?>
