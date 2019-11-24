$(document).ready(function() {

  $('.pedidos-accordions-header').click(function(e) {
    let pedido = $(e.target).parents('.pedidos-accordions').data('pedido');
    $('#pedido' + pedido + '-accordion-collapse').collapse('toggle');
  });

  var domain = document.location.host;
  if (domain == 'www.doomus.com.br' || domain == 'doomus.com.br') {
    domain = 'https://www.doomus.com.br/public';
  } else {
    domain = 'http://localhost:8000';
  }

  $('#cancelOrder').click(function() {
    let pedido_id = $(this).data('pedido-id');

    window.location.href = domain + '/pedido/cancel/' + pedido_id; 
  });

  $('.showProducts').click(function() {
    let orderId = $(this).data('pedido-id');
    let url = $(this).data('href');
    $.ajax({
      type: "GET",
      url: url,
      data: {order_id:orderId},
      dataType: "JSON",
      complete: function (response) {
        let products = response.responseJSON;
        $(products).each(function (index, element) {

          $('#modalProductsBody').append('<tr id="product' + element.product_id + '-row"></tr>');

          if (element.product_image == 'logo_icone.png') {
            $('#product' + element.product_id + '-row').append(
              '<td>' +
                '<img src=' + domain + '/img/' + element.product_image + '" alt="' + element.product_name + ' imagem" width="80px" height="80px">' +
                '<span class="font-weight-bolder ml-1">' + element.product_name + '</span>'
            + '</td>'); 
          } else {
            $('#product' + element.product_id + '-row').append(
              '<td>' +
                '<img src=' + domain + '/img/products/' + element.product_image + '" alt="' + element.product_name + ' imagem" width="80px" height="80px">' +
                '<span class="font-weight-bolder ml-1">' + element.product_name + '</span>'
            + '</td>'); 
          }

          if (element.product_discount === null) {
            $('#product' + element.product_id + '-row').append(
              '<td class="align-middle">' +
                element.product_qty + 'x de ' +
                'R$ ' + element.product_price.toString().replace('.', ',')
              + '</td>'
            );    
          } else {
            var price = element.product_price - (element.product_price * element.product_discount);
            $('#product' + element.product_id + '-row').append(
              '<td class="align-middle">' +
                element.product_qty + 'x de ' +
                'R$ ' + price.toFixed(2).toString().replace('.', ',')
              + '</td>'
            );
          }
        });

        $('#orderProductsModal').modal('show');
      }
    });
  });



  $('#orderProductsModal').on('hidden.bs.modal', function() {
    if (!$('#modalProductBody').is(':empty')) {
      $('#modalProductsBody').empty();
    }
  });
});