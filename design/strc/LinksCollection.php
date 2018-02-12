<?php
class LinksCollection
{
  private $_links = array();

  public function push($link)
  {
    array_push($this->_links, $link);
  }

  public function print_a($index, $target)
  {
    $index = $index || 0;
    $target = $target || '_blank';
    $full_line = '<a href="' . $this->_links[$index]->get('href') . '"';
    if (!empty($this->_links[$index]->get('class'))) {
      $full_line = $full_line . ' class="' . $this->_links[$index]->get('class') . '"';
    }

    $full_line = $full_line . ' target="_' . $target . '">' . $this->_links[$index]->get('title') . '</a>';

    echo $full_line;
  }
}
?>
