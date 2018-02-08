// TODO: in need of correction for select focus in and out

function resizeMain()
{
  if ($nav.children('button').hasClass('active')) {
    $('main').css('width', $(document).width() - $nav.width());
  } else {
    $('main').removeAttr('style');
  }
}

$(document).ready(function () {
  $nav = $('#second_nav');

  // class 'active' toggler
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

  $('#second_nav > button').click(function () {
    resizeMain();
  });
});
