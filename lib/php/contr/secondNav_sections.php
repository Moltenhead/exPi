<?php
if ($where_inf->id != null) {
  if ($where_inf->hasNavSections()) {
    include_once(objPath('view', 'secondNav_sections.php'));
  } else {
    echo '<h3 class="section_header">No navigation section</h3>';
  }
} else {
  echo '<h3 class="section_header">No page index</h3>';
}
?>
