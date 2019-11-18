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
    let qty = $(e.target).val();
    let productRowId = $('.productRowId'+product).text();
    let productId = $('.productId'+product).text();

    let newValue = (productValue*qty).toFixed(2).replace('.', ',');

    $('.newProductValue'+product).data('value', parseFloat(newValue.replace(',', '.')));
    $('.newProductValue'+product).text('R$' + newValue);

    let total = 0;
    $('.eachProductValue').each(function () {
      // console.log($(this).data('value'));
      total += $(this).data('value');
      
    });

    $('#totalCart').data('valor-total', total);

    if (!$('#dadosFrete').hasClass('d-none')) {
      let sub_total, valor_frete, novo_total;

      sub_total = parseFloat($('#totalCart').data('valor-total'));
      valor_frete = parseFloat($('#valorFrete').data('valor-frete'));

      novo_total = sub_total + valor_frete;
      console.log(novo_total);

      $('#valorTotalCompra').text('R$ ' + novo_total.toFixed(2).replace('.', ','));
    }

    

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
        $('#valorFrete').data('valor-frete', response.valorFrete);

        let valorSemFrete = parseFloat($('#totalCart').text().substring(2).replace(',','.'));
        let totalComFrete = (valorSemFrete + parseFloat(response.valorFrete)).toFixed(2);

        $('#valorTotalCompra').text('R$ ' + totalComFrete.toString().replace('.',','));
      }
    });
    
  });
});