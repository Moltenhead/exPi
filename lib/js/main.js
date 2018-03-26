/* ----------------------- OBJECTS ----------------------- */
//(function ($) { //an IIFE so safely alias jQuery to $
$.Slider = function (elt) {
  this.elt = (elt instanceof $) ? elt : $(elt);
  /*handle passed JQuery objects, DOM elements and selector strings
  * TODO: check elt validity, or if selector string matches an element
  */

  this.baseLeft = this.elt.offset().left;
  this.container = elt.find('.slider_container');

  if (this.elt.parent().attr('id') === 'magic_wrapper') {
    this.nav = {
      left: this.elt.parent().children('.go_left'),
      right: this.elt.parent().children('.go_right'),
    };
  } else {
    this.nav = {
      left: this.elt.children('.slider_nav').children('.go_left'),
      right: this.elt.children('.slider_nav').children('.go_right'),
    };
  }

  this.decal = 0;//initiating basic decal
  //initializing needed elements
  this.width = this.container.find('.slide_wrapper').width();
  this.slideNb = this.container.find('.slide_wrapper').length;
  this.contMaxDecal = elt.width() / this.width;
  this.maxDecal = (this.slideNb - this.contMaxDecal);
  this.noViewAdjust = (this.elt.hasClass('no_view_adjust')) ? true : false;
};

$.Slider.prototype = {
  adjustView: function ()
  {
    if (this.noViewAdjust === false) {
      if (this.decal === 0) {
        $(this.nav.left).css('visibility', 'hidden');
      } else if (this.decal === this.maxDecal) {
        $(this.nav.right).css('visibility', 'hidden');
      } else {
        $(this.nav.left).css('visibility', 'visible');
        $(this.nav.right).css('visibility', 'visible');
      }
    }
  },

  adjustPos: function ()
  {
    var newPose = -this.decal * this.width + this.baseLeft;
    $(this.container).offset({ left: newPose });
  },

  adjust: function ()
  {
    this.adjustView();
    this.adjustPos();
  },

  InitEvents: function ()
  {
    var _this = this;
    $(this.nav.left).click(function ()
      {
        if (_this.decal > 0) {
          _this.decal--;
          _this.adjust();
        }//else doesn't move
      }
    );

    $(this.nav.right).click(function ()
      {
        if (_this.decal < _this.maxDecal) {
          _this.decal++;
          _this.adjust();
        }//else doesn't move
      }
    );
  },
};

//}(JQuery));

// handles .obscurer DOMobject behavior
function activeObscurer()
{
  if (!$('#obscurer').hasClass('active')) {
    $('#obscurer').addClass('active');
    $('main').css('filter', 'blur(5px)');
    $('#background_sticker').css('z-index', '100');
    $('#background_sticker').css('opacity', '1');
    $('#background_sticker').css('filter', 'grayscale(0)');
  } else {
    $('#obscurer').removeClass('active');
    $('main').css('filter', '');
    $('#background_sticker').removeAttr('style');
  }
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
    activeObscurer();
  });

  $('.slider_wrapper').each(function () {
    var slider = new $.Slider($(this));console.log(slider);
    slider.adjustView();
    slider.InitEvents();
  });

  $('.page_button').click(function (event) {
    event.preventDefault();

    $(this).parent().attr(
      'action',
      $(this).parent().attr('action') +
        '&page=' +
        $(this).attr('value')
    );

    $(this).parent().submit();
  });
});

$(document).resize(function () {
  $('.slider_wrapper').each(function () {
    var slider = new $.Slider($(this));console.log(slider);
    slider.adjustView();
    slider.InitEvents();
  });
});
