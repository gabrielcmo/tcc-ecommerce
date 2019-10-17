const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
  return mdc.ripple.MDCRipple.attachTo(el);
});

$('.product-card-action').click(function (e){
  let product_id = $(this).data('id');
  console.log(product_id);
  window.location.href = "http://localhost:8000/produto/" + product_id; 
});

$('.addProductToCart').click(function(e){
  let product_id = $(this).parents('.mdc-card__actions').prev().data('id');
  window.location.href = "http://localhost:8000/carrinho/" + product_id + "/add";
});