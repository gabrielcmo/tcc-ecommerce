$(document).ready(function(){
  function totalCart() {
    var total = 0;
    $('.eachProductValue').each(function () {
      total += $(this).data('value');
    });
    $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
  }
  
  $('#valorTotalCompra').text('--')
  totalCart();

  $('.inputQty').change(function (e) { 
    e.preventDefault();
    
    let product = $(e.target).data('product');
    let productValue = $('.productValue'+product).text().substring(2).replace(',', '.');
    let qty = parseInt($(e.target).val());
    let productRowId = $('.productRowId'+product).text();
    let productId = $('.productId'+product).text()

    let newValue = (productValue*qty).toFixed(2).replace('.', ',');

    $('.newProductValue'+product).data('value', parseFloat(newValue.replace(',', '.')));
    $('.newProductValue'+product).text('R$' + newValue);

    let total = 0;
    $('.eachProductValue').each(function () {
      // console.log($(this).data('value'));
      total += $(this).data('value');
      
    });
    $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
    
    $.ajax({
      method: 'GET',
      url : "/carrinho/" + productRowId + "/" + qty + "/" + productId
    });
  });

  $('#formCalcularFrete').submit(function (e) {
    e.preventDefault();

    let form = $(this),
      cep = form.find("input[name='cep']").val(),
      url = form.attr('action');
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: url,
      data: {cep:cep},
      dataType: "JSON",
      success: function (response) {
        $('#dadosFrete').removeClass('d-none');
        $('#prazoFrete').text('Frete (prazo de ' + response.prazoFrete + ' dias)');
        $('#valorFrete').text('R$ ' + response.valorFrete);

        let valorSemFrete = parseFloat($('#totalCart').text().substring(2).replace(',','.'));
        let totalComFrete = (valorSemFrete + parseFloat(response.valorFrete)).toFixed(2);
        $('#valorTotalCompra').text('R$ ' + totalComFrete.toString().replace('.',','));
      }
    });
    
  });
});