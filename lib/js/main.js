$(document).ready(function () {
  //activateur de classe "active"
  $('.activable').each(function () {
    $this = $(this);
    if ($this.has('select')) {
      $this.click(function () {
        $this.toggleClass('active');
      });

      $this.children('select').focusout(function () {
        $this.removeClass('active');
      });
    } else {
      $this.click(function ()
      {
        $this.toggleClass('active');
      });
    }
  });
});
