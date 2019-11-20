
$(document).ready(function(){
  function totalCart() {
    var total = 0;
    $('.eachProductValue').each(function () {
      total += $(this).data('value');
    });
    $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
  }
  
  totalCart();

  $('.inputQty').blur(function (e) { 
    e.preventDefault();
    
    $('#botaoContinuarCarrinhoLabel').remove();

    $('#botaoContinuarCarrinho').attr('disabled', true);

    $('#botaoContinuarCarrinho').html('<div class="spinner-border text-light" id="botaoCalcularFreteLabel" role="status"><span class="sr-only">Calculando...</span></div>')

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
      valor_frete = $('#valorFrete').data('valor-frete');

      novo_total = sub_total + valor_frete;
      console.log(novo_total, sub_total, valor_frete);

      $('#valorTotalCompra').text('R$ ' + novo_total.toFixed(2).replace('.', ','));
    }

    

    $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
    
    $.ajax({
      method: 'GET',
      url : "/carrinho/" + productRowId + "/" + qty + "/" + productId,
      success: function (response) {
        if (response.status == 'success') {
          $('#botaoContinuarCarrinhoLabel').remove();

          $('#botaoContinuarCarrinho').attr('disabled', false);
  
          $('#botaoContinuarCarrinho').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Continuar</span>');

          $(e.target).css('color', 'green');
        } else {
          $('#qtyAlert').removeClass('d-none');
          $('#qtyAlert').html(response.message);

          setTimeout(() => {
            $('#qtyAlert').addClass('d-none');
          }, 5000);

          $('#botaoContinuarCarrinhoLabel').remove();

          $('#botaoContinuarCarrinho').attr('disabled', true);
  
          $('#botaoContinuarCarrinho').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Continuar</span>');
        }
      }
    });

  });

  $('#formCalcularFrete').submit(function (e) {
    e.preventDefault();
    
    $('#botaoCalcularFreteLabel').remove();
    
    $('#botaoCalcularFrete').attr('disabled', true);
    
    $('#botaoCalcularFrete').html('<div class="spinner-border text-light" id="botaoCalcularFreteLabel" role="status"><span class="sr-only">Calculando...</span></div>')
    
    let form = $(this),
      cep = form.find("input[name='cep']").val(),
      url = form.attr('action');

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
        let totalComFrete = (valorSemFrete + response.valorFrete);

        $('#valorTotalCompra').text('R$ ' + totalComFrete.toString().replace('.',','));

        $('#botaoCalcularFreteLabel').remove();

        $('#botaoCalcularFrete').attr('disabled', false);

        $('#botaoCalcularFrete').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Calcular</span>')

      }
    });
    
  });
});