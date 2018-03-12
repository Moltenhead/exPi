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
      left: this.elt.parent().children('button').get(0),
      right: this.elt.parent().children('button').get(1),
    };
  } else {
    this.nav = {
      left: this.elt.children('button').get(0),
      right: this.elt.children('button').get(1),
    };
  }

  this.decal = 0;//initiating basic decal
  //initializing needed elements
  this.width = this.container.find('.slide_wrapper').width();
  this.slideNb = this.container.find('.slide_wrapper').length;
  this.contMaxDecal = elt.width() / this.width;
  this.maxDecal = (this.slideNb - this.contMaxDecal);
};

$.Slider.prototype = {
  adjustView: function ()
  {
    if (this.decal === 0) {
      $(this.nav.left).css('visibility', 'hidden');
    } else if (this.decal === this.maxDecal) {
      $(this.nav.right).css('visibility', 'hidden');
    } else {
      $(this.nav.left).css('visibility', 'visible');
      $(this.nav.right).css('visibility', 'visible');
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

// TODO: in need of correction for select focus in and out
function resizeMain()
{
  if ($secNav.children('button').hasClass('active')) {
    $('main').css('width', $(document).width() - $secNav.width());
  } else {
    $('main').removeAttr('style');
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
    resizeMain();
  });

  $('.slider_wrapper').each(function () {
    var slider = new $.Slider($(this));
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

  $('.disp_button').click(function (event) {
    event.preventDefault();

    $(this).parent().attr(
      'action',
      $(this).parent().attr('action') +
        '&disp=' +
        $(this).attr('value')
    );

    $(this).parent().submit();
  });

//TODO: doesn't work if there is multiple #xp_datas
  $('.send_xp').click(function (event) {
    event.preventDefault();

    $form = $('form#xp_datas');
    $location = $(location).attr('href');alert($location);
    var where = $location.replace('^((.)?(exPi)+(/|\.[\w]{1,10})+)(.)?$', '$1/lib/php/mod/');

    $form.attr(
      'action',
      where);
  });
});
