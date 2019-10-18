$(document).ready(function(){
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
