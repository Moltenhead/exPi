// TODO: in need of correction for select focus out and in

function resizeMain()
{
  if ($nav.children('button').hasClass('active')) { alert('hoy');
    $('main').css('width', $(document).width() - $nav.width());
  } else { alert('yo');
    $('main').removeAttr('style');
  }
}

$(document).ready(function () {
  $nav = $('#second_nav');

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

  $('#second_nav > button').click(resizeMain());
});
