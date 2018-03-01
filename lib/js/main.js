// TODO: in need of correction for select focus in and out

function resizeMain()
{
  if ($secNav.children('button').hasClass('active')) {
    $('main').css('width', $(document).width() - $secNav.width());
  } else {
    $('main').removeAttr('style');
  }
}

function slide(elt)
{
  var baseLeft = elt.parent().offset().left;

  var slider;
  if (elt.parent().attr('id') === 'magic_wrapper') {
    slider = elt.parent().find('.slider_container');
    baseLeft = baseLeft + elt.width();
  } else {
    slider = elt.children('.slider_container');
  }

  var width = slider.find('.slide_wrapper')[0].offsetWidth;

  var left = slider.offset().left - baseLeft;console.log(left);
  var decal = Math.round(left / width);
  var contMaxDecal = Math.round(slider.parent().width() / width);
  var maxDecal = -(slider.find('.slide_wrapper').length - contMaxDecal);

  var move;
  if (decal >= 0) {
    (elt.index() !== 0) ? move = (decal - 1) : '';
  } else if (decal <= maxDecal) {
    (elt.index() === 0) ? move = (decal + 1) : '';
  } else {
    (elt.index() !== 0) ? move = (decal - 1) : move = decal + 1;
  }

  var newPos = move * width + baseLeft;
  slider.offset({ left: newPos });
}

$(document).ready(function () {
  $secNav = $('#second_nav');

  // class 'active' toggler
  $('.activable').click(function () {
    $this = $(this);
    $this.toggleClass('active');

    if ($this.has('select')) {
      var select = $this.children('select');
      select.toggleClass('active');
      select.children('option').click(function () {
        $this.removeClass('active');
      });

      select.focusout(function () {
        $this.removeClass('active');
      });
    }

    if ($this.hasClass('parent_transmissive')) {
      $this.parent().toggleClass('active');
    }
  });

  $('#second_nav > button').click(function () {
    resizeMain();
  });

  $('.slider_button').click(function (evt) {
    slide($(evt.target));
  });
});
