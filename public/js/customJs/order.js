$(document).ready(function() {
  $('.pedidos-accordions-header').click(function(e) {
    let pedido = $(e.target).parents('.pedidos-accordions').data('pedido');
    $('#pedido' + pedido + '-accordion-collapse').collapse('toggle');
  });
  $('.showProducts').click(function(e) {
    let order_id = $(e.target).data('pedido_id')
  });
});