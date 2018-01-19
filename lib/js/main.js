$(document).ready(function () {
  //activateur de classe "active"
  $('.activable').each(function () {
    $this = $(this);
    if ($this.has('select')) {
      var select = $this.children('select');
      select.click(function () {
        $this.toggleClass('active');
      });

      select.children('option').click(function () {
        $this.removeClass('active');
      });

      select.focusout(function () {
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
