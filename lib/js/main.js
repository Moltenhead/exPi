window.onload = function ()
{
  var activable = document.getElementsByClassName('activable');

  for (i = 0; i < activable.length; i++) {
    activable[i].addEventListener('click', function ()
    {
      this.classList.toggle('active');
    });
  }
};
