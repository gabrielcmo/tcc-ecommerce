$(document).ready(function(){
  const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action, .mdc-fab';
  const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
    return mdc.ripple.MDCRipple.attachTo(el);
  });
  
  var domain = document.location.host;

  if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
    domain = "www.doomus.com.br/public";
  }

  $('.product-card-action').click(function (e){
    let product_id = $(this).data('id');
    window.location.href = "http://" + domain + "/produto/" + product_id; 
  });
  
  $('.addProductToCart').click(function(e){
    let product_id = $(this).parents('.mdc-card__actions').prev().data('id');
    window.location.href = "http://" + domain + "/carrinho/" + product_id + "/add";
  });
  
  let windowWidth = sessionStorage.getItem('windowWidth');
  if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
    $('#toggleSearchBarButton').removeClass('d-none');
  } else {
    $('#toggleSearchBarButton').addClass('d-none');
  }

  $(window).resize(function() {
    let width = $(window).width();
    if ((width >= 576 && width < 992) || (width < 576)) {
      $('#toggleSearchBarButton').removeClass('d-none');
    } else {
      $('#toggleSearchBarButton').addClass('d-none');
    }
  });

  $('#toggleSearchBarButton').click(function() {
    $('.input-search-sm-devices').removeClass('d-none');
    $('.mdc-drawer-scrim').show();
    $('.mdc-drawer-scrim').addClass('show');
  });
  
  $('.mdc-drawer-scrim').click(function (e) {
    if ($('.mdc-drawer-scrim').hasClass('show')) {
      if ($(e.target).hasClass('mdc-drawer-scrim')) {
        $('.mdc-drawer-scrim').hide();
        $('.input-search-sm-devices').addClass('d-none');
      }
    }
  });

});
