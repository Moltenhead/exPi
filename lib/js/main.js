// TODO: in need of correction for select focus out and in

$(document).ready(function () {
  //activateur de classe "active"
  $('.activable').click(function () {
    $(this).toggleClass('active');

    if ($(this).has('select')) {
      var select = $(this).children('select');
      select.toggleClass('active');
      select.children('option').click(function () {
        $(this).removeClass('active');
      });

      select.focusout(function () {
        $(this).removeClass('active');
      });
    }

    if ($(this).hasClass('parent_transmissive')) {
      $(this).parent().toggleClass('active');
    }
  });
});
