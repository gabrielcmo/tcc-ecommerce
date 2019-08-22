const iconButtons = document.querySelectorAll('.mdc-icon-button');

iconButtons.forEach(iconButton => {
  const button = mdc.ripple.MDCRipple.attachTo(iconButton);
  button.unbounded = true;
});


$(document).ready(function(){  
  var width = sessionStorage.getItem('windowWidth');

  if ((width < 576) || (width >= 576 && width < 992)) {
    $('#productTableHeader').remove();
    $('#productTableItens').remove();
  }
  
  $(window).resize(function(){
    width = $(window).width();

    if ((width < 576) || (width >= 576 && width < 992)) {
      $('#productTableHeader').hide();
      $('#productTableItens').hide();
    }
    if (width >= 992){
      $('#productTableHeader').show()
      $('#productTableItens').show();
    }
  });
});

