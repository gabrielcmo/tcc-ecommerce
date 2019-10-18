$(document).ready(function (){
  $('#info-accordion-header').click(function (){
    $('#info-accordion-collapse').collapse('toggle');
  });

  $('#info-accordion-collapse').on('show.bs.collapse', function () {
    $('#info-accordion-icon').removeClass('fa-plus');
    $('#info-accordion-icon').addClass('fa-minus');
  });

  $('#info-accordion-collapse').on('hide.bs.collapse', function () {
    $('#info-accordion-icon').removeClass('fa-minus');
    $('#info-accordion-icon').addClass('fa-plus');
  });
  
  const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
  const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
    return mdc.ripple.MDCRipple.attachTo(el);
  });
  
  var domain = document.location.host;
  if (domain == "www.doomus.com.br") {
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
});

