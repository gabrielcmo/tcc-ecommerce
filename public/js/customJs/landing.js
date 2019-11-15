$(document).ready(function(){
  const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
  const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
    return mdc.ripple.MDCRipple.attachTo(el);
  });
  
  var domain = document.location.host;

  if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
    domain = "https://www.doomus.com.br/public";
  } else {
    domain = 'http://localhost:8000';
  }

  $('.product-card-action').click(function (e){
    let product_id = $(this).data('id');
    window.location.href = domain + "/produto/" + product_id; 
  });

  $('#toggleSearchBarButton').click(function() {
    $('.input-search-sm-devices').removeClass('d-none');
    $('.mdc-drawer-scrim').show();
    $('.mdc-drawer-scrim').addClass('show');
    $('#resultSearch').show();
    $('#resultSearch').addClass('show');
  });
  

});
