$(document).ready(function() {

  $('.pedidos-accordions-header').click(function(e) {
    let pedido = $(e.target).parents('.pedidos-accordions').data('pedido');
    $('#pedido' + pedido + '-accordion-collapse').collapse('toggle');
  });

  var domain = document.location.host;
  if (domain == 'www.doomus.com.br' || domain == 'doomus.com.br') {
    domain = 'www.doomus.com.br/public';
  }

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
                '<img src="http://' + domain + '/img/' + element.product_image + '" alt="' + element.product_name + ' imagem" width="80px" height="80px">' +
                '<span class="font-weight-bolder ml-1">' + element.product_name + '</span>'
            + '</td>'); 
          } else {
            $('#product' + element.product_id + '-row').append(
              '<td>' +
                '<img src="http://' + domain + '/img/products/' + element.product_image + '" alt="' + element.product_name + ' imagem" width="80px" height="80px">' +
                '<span class="font-weight-bolder ml-1">' + element.product_name + '</span>'
            + '</td>'); 
          }

          $('#product' + element.product_id + '-row').append(
            '<td class="align-middle">' +
              element.product_qty + 'x de ' +
              'R$ ' + element.product_price.toString().replace('.', ',')
            + '</td>'
          );
        });

        $('#orderProductsModal').modal('show');
      }
    });
  });

  $('.showAvaliate').click(function() {
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
          $('#optionProducts').append('<option value='+element.product_id + '>'+ element.product_name +'</option>');
        });

        $('#productAvaliateModal').modal('show');
      }
    });
  });

  $('#orderProductsModal').on('hidden.bs.modal', function() {
    if (!$('#modalProductBody').is(':empty')) {
      $('#modalProductsBody').empty();
    }
  });
});