
$(document).ready(function(){


  if (sessionStorage.getItem('primeiro-acesso-carrinho') != 'false') {
    sessionStorage.setItem('primeiro-acesso-carrinho', true); 
  }

  if (sessionStorage.getItem('primeiro-acesso-carrinho') == 'true') {
    sessionStorage.setItem('localidade', null);
    sessionStorage.setItem('uf', null);
    sessionStorage.setItem('logradouro', null);
    sessionStorage.setItem('bairro', null);
    sessionStorage.setItem('valorFrete', null);
    sessionStorage.setItem('prazoFrete', null);
    sessionStorage.setItem('cep', null);
    sessionStorage.setItem('primeiro-acesso-carrinho', false);
  }

  
  var domain = document.location.host;
  if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
      domain = "https://www.doomus.com.br/public";
  } else {
      domain = "http://localhost:8000";
  }

  function totalCart() {
    var total = 0;
    $('.eachProductValue').each(function () {
      total += $(this).data('value');
    });
    $('#totalCart').text("R$ "+total.toFixed(2).replace('.',','));
    $('#totalCart').data('valor-total', total);
  }
  
  totalCart();

  let valorFrete = parseFloat(sessionStorage.getItem('valorFrete'));
  let prazoFrete = sessionStorage.getItem('prazoFrete');
  if (valorFrete != "null" && prazoFrete != "null") {
    $('#dadosFrete').removeClass('d-none');
    $('#prazoFrete').text('Frete (prazo de ' + prazoFrete + ' dias)');
    $('#valorFrete').text('R$ ' + valorFrete.toString().replace('.', ','));

    let carrinho = $('#totalCart').data('valor-total');

    let total_carrinho = carrinho + valorFrete;
    $('#valorTotalCompra').text('R$ ' + total_carrinho.toString().replace('.', ','));
  } else {
    let carrinho = $('#totalCart').data('valor-total');
    $('#valorTotalCompra').text('R$ ' + carrinho.toFixed(2).toString().replace('.', ','));
  }


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

    let sub_total, valor_frete, novo_total;

    if (!$('#dadosFrete').hasClass('d-none')) {

      sub_total = parseFloat($('#totalCart').data('valor-total'));
      valor_frete = parseFloat(sessionStorage.getItem('valorFrete'));

      novo_total = sub_total + valor_frete;

      $('#valorTotalCompra').text('R$ ' + novo_total.toFixed(2).replace('.', ','));
    } else {
      sub_total = parseFloat($('#totalCart').data('valor-total'));

      novo_total = sub_total;

      $('#valorTotalCompra').text('R$ ' + novo_total.toFixed(2).replace('.', ','));
    }

    

    $('#totalCart').text("R$"+total.toFixed(2).replace('.',','));
    
    $.ajax({
      method: 'GET',
      url : domain +"/carrinho/" + productRowId + "/" + qty + "/" + productId,
      success: function (response) {
        if (response.status == 'success') {
          $('#botaoContinuarCarrinhoLabel').remove();

          $('#botaoContinuarCarrinho').attr('disabled', false);
  
          $('#botaoContinuarCarrinho').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Continuar</span>');

          $(e.target).css('color', 'green');
        } else {
          $('#qtyAlert').removeClass('d-none');
          $('#qtyAlert').html(response.message);
          $(e.target).css('color', 'red');

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

    if ($('#cep').val().length != 8) {
      $('#cepErro').removeClass('d-none');
      $('#cepErro').text('Um CEP deve conter apenas 8 caracteres');

      setTimeout(() => {
        $('#cepErro').addClass('d-none');
      }, 5000);
    } else {
      $('#botaoCalcularFrete').popover('hide');
      $('#botaoCalcularFreteLabel').remove();
      
      $('#botaoCalcularFrete').attr('disabled', true);
      
      $('#botaoCalcularFrete').html('<div class="spinner-border text-light" id="botaoCalcularFreteLabel" role="status"><span class="sr-only">Calculando...</span></div>')
      
      let form = $(this),
        cep = form.find("input[name='cep']").val(),
        url = 'https://viacep.com.br/ws/' + cep + '/json'
        
        var xhr = $.ajax({
          type: "GET",
          url: url,
          data: {cep:cep},
          dataType: "JSON",
          success: function (response) {
            if (response.erro != true) {
              sessionStorage.setItem('cep', response.cep);
  
              if (response.localidade !== "" && response.uf !== "") {
                sessionStorage.setItem('localidade', response.localidade);
                sessionStorage.setItem('uf', response.uf);
                sessionStorage.setItem('logradouro', null);
                sessionStorage.setItem('bairro', null);
              }
              if (response.logradouro !== "" && response.uf !== "") {
                sessionStorage.setItem('localidade', response.localidade);
                sessionStorage.setItem('uf', response.uf);
                sessionStorage.setItem('logradouro', response.logradouro);
                sessionStorage.setItem('bairro', response.bairro);
              }
  
              $.ajax({
                type: "GET",
                url: domain + '/calc/frete',
                data: {cep: cep},
                dataType: "JSON",
                success: function (response) {
                  $('#dadosFrete').removeClass('d-none');
                  $('#prazoFrete').text('Frete (prazo de ' + response.prazoFrete + ' dias)');
                  $('#valorFrete').text('R$ ' + (response.valorFrete).toString().replace('.', ','));
                  $('#valorFrete').data('valor-frete', response.valorFrete);
  
                  sessionStorage.setItem('valorFrete', response.valorFrete);
                  sessionStorage.setItem('prazoFrete', response.prazoFrete);
  
                  let valorSemFrete = parseFloat($('#totalCart').text().substring(2).replace(',','.'));
                  let totalComFrete = (valorSemFrete + response.valorFrete);
  
          
                  $('#valorTotalCompra').text('R$ ' + totalComFrete.toFixed(2).toString().replace('.',','));
          
                  $('#botaoCalcularFreteLabel').remove();
          
                  $('#botaoCalcularFrete').attr('disabled', false);
          
                  $('#botaoCalcularFrete').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Calcular</span>');
  
                  xhr.abort();
                }
              });
            }
            if (response.erro == true) {
              $('#cepErro').removeClass('d-none');
              $('#cepErro').text('Puts, parece que esse CEP não existe, porque não tenta colocar outro?');
              $('#dadosFrete').addClass('d-none');
  
              let total_sem_frete = $('#totalCart').data('valor-total');
              $('#valorTotalCompra').text('R$ ' + total_sem_frete.toFixed(2).toString().replace('.', ','));
  
              $('#botaoCalcularFrete').attr('disabled', false);
      
              $('#botaoCalcularFrete').html('<span class="mdc-button__label" id="botaoCalcularFreteLabel">Calcular</span>');
  
                sessionStorage.setItem('localidade', null);
                sessionStorage.setItem('uf', null);
                sessionStorage.setItem('logradouro', null);
                sessionStorage.setItem('bairro', null);
                sessionStorage.setItem('valorFrete', null);
                sessionStorage.setItem('prazoFrete', null);
                sessionStorage.setItem('cep', null);
  
              setTimeout(() => {
                $('#cepErro').addClass('d-none');
              }, 5000);
            }
          }
      });
    }
  });

  $('#formDescobrirCep').submit(function(e) {
    e.preventDefault();

    let rua, cidade, estado;

    rua = $('#rua').val();
    cidade = $('#cidade').val();
    estado = $('#estado').val();

    let url = 'https://viacep.com.br/ws/' + estado + '/' + cidade + '/' + rua + '/json';

    $.ajax({
      type: "GET",
      url: url,
      dataType: "JSON",
      success: function (response) {
        if (response[0] !== undefined) {
          $('#cepSuccess').removeClass('d-none');
          $('#cepSuccess').text('Conseguimos achar seu CEP, aqui está ' + response[0].cep + ', não se preocupe, já guardamos ele paras as próximas etapas!');
          
          sessionStorage.setItem('cep', (response[0].cep).replace('-', ''));
          $('#cep').val((response[0].cep).replace('-', ''));
          setTimeout(() => {
            $('#cepSuccess').addClass('d-none');
            $('#modalConsultarCep').modal('hide');
          }, 2000);

          setTimeout(() => {
            $('#botaoCalcularFrete').popover('show');
          }, 2000);

        }

        if (response.length == 0) {
          $('#cepError').removeClass('d-none');
          $('#cepError').text('Infelizmente não conseguimos achar o seu CEP, por favor, verifique se seus dados estão corretos');

          setTimeout(() => {
            $('#cepError').addClass('d-none');
          }, 5000);
        }
      }
    });
  });

  $.validator.setDefaults({
    errorClass: 'label-invalid mb-0',
    highlight: function (element) {
        $(element).removeClass('input-valid');
        $(element).addClass('input-invalid');
        $(element.form).find("label[for=" + element.id + "]").addClass('label-invalid mb-0');
    },
    unhighlight: function (element) {
        $(element).removeClass('input-invalid');
        $(element).addClass('input-valid');
        $(element.form).find("label[for=" + element.id + "]").removeClass('label-invalid mb-0');
    }
});
  $('#formDescobrirCep').validate({
    rules : {
      rua: {
        required: true
      },
      cidade: {
        required: true
      },
      estado: {
        required: true
      }
    },
    messages: {
      rua: {
        required: 'Esse campo é obrigatório.'
      },
      cidade: {
        required: 'Esse campo é obrigatório.'
      },
      estado: {
        required: 'Esse campo é obrigatório.'
      }
    }
  })
});