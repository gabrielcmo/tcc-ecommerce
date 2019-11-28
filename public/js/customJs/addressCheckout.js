$(document).ready(function () {


  if (sessionStorage.getItem('primeiro-acesso-endereco') != 'false') {
    sessionStorage.setItem('primeiro-acesso-endereco', true); 
  }

  if (sessionStorage.getItem('primeiro-acesso-endereco') == 'true') {      
      sessionStorage.setItem('cupomDesconto', null);
      sessionStorage.setItem('cupomNome', null);
      sessionStorage.setItem('primeiro-acesso-endereco', false); 
  }

    var cep, localidade, uf, logradouro, bairro, valorFrete, prazoFrete, cupomNome, cupomDesconto, total_carrinho;

    cep = sessionStorage.getItem('cep');
    localidade = sessionStorage.getItem('localidade');
    uf = sessionStorage.getItem('uf');
    logradouro = sessionStorage.getItem('logradouro');
    bairro = sessionStorage.getItem('bairro');
    valorFrete = sessionStorage.getItem('valorFrete');
    prazoFrete = sessionStorage.getItem('prazoFrete');
    cupomNome = sessionStorage.getItem('cupomNome');
    cupomDesconto = sessionStorage.getItem('cupomDesconto');
    total_carrinho = parseFloat($('#totalCart').data('total-carrinho'));

    if (valorFrete != "null" && prazoFrete != "null") {
        $('#dadosFrete').removeClass('d-none');
        $('#prazoFrete').text('Frete (prazo de ' + prazoFrete + ' dias)');
        $('#valorFrete').text('R$ ' + valorFrete.toString().replace('.', ','));
    }

    if (cupomNome != "null" && cupomDesconto != "null") {
        $('.cupomTr').removeClass('d-none');
        $('#cupomText').text('(' + cupomNome + ')');
        $('#descontoPorcentagem').text('- '+ cupomDesconto*100 + '%');
        let descontoValor = (1 - cupomDesconto) * total_carrinho;
        let valor_final = total_carrinho - descontoValor;
        $('#descontoValor').text('(R$ ' + valor_final.toFixed(2).toString().replace('.', ',') + ')');
    }

    if (cep != "null") {
        if (localidade != "null" && uf != "null") {
            $('#cep').val(cep.replace('-', '')).data('check', 'valid').addClass('input-valid');
            $('#city').val(localidade).addClass('input-valid');
            $('#state').val(uf).addClass('input-valid');
        }
        if (logradouro != "null" && bairro != "null") {
            $('#cep').val(cep.replace('-', '')).data('check', 'valid').addClass('input-valid');
            $('#address').val(logradouro).addClass('input-valid');
            $('#bairro').val(bairro).addClass('input-valid');
            $('#city').val(localidade).addClass('input-valid');
            $('#state').val(uf).addClass('input-valid');
        }
    }

    if (valorFrete == "null" && cupomDesconto == "null") {
        $('#totalOpcao').text('Total');

        $('#totalCart').text('R$ ' + total_carrinho.toFixed(2).toString().replace('.', ','));
    }
    if (valorFrete != "null" && cupomDesconto == "null") {
        $('#totalOpcao').text('Total (c/ frete)');
        let total_com_frete = parseFloat(valorFrete) + parseFloat(total_carrinho);
        $('#totalCart').text('R$ ' + total_com_frete.toFixed(2).toString().replace('.', ','));
    }

    if (valorFrete == "null" && cupomDesconto != "null") {
        $('#totalOpcao').text('Total (c/ desconto)');
        let descontoValor = (1 - cupomDesconto) * total_carrinho;
        let valor_com_cupom = total_carrinho - descontoValor;
        $('#totalCart').text('R$ ' + valor_com_cupom.toFixed(2).toString().replace('.', ','));
    }
    if (valorFrete != "null" && cupomDesconto != "null") {
        $('#totalOpcao').text('Total (c/ frete e desconto)');
        let total = parseFloat(total_carrinho) - (parseFloat(total_carrinho) * cupomDesconto);
        $('#totalCart').text('R$ ' + (total + parseFloat(valorFrete)).toFixed(2).toString().replace('.', ','));
    }
    var domain = document.location.host;
    if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
        domain = "https://www.doomus.com.br/public";
    } else {
        domain = "http://localhost:8000";
    }
    var verifyCep, verifyCepStatus, cepData;


    if (cep != "null") {
        verifyCep = cep.replace('-', '');
    }

    if ($('#cep').data('variavel-escape') == 'true') {
        verifyCep = $('#cep').data('variavel-escape');
    }

    $('#useAddressSaved').click(function () {
        $.ajax({
            type: "GET",
            url: domain + "/get/saved/address",
            data: null,
            dataType: "JSON",
            success: function (response) {

                if (response.textStatus == 'success') {
                    $('#address').val(response.endereco).addClass('input-valid');
                    $('#bairro').val(response.bairro).addClass('input-valid');
                    $('#state').val(response.estado).addClass('input-valid');
                    $('#city').val(response.cidade).addClass('input-valid');
                    $('#cep').val(response.cep).addClass('input-valid').data('check', 'valid').data('variavel-escape', true);
                    $('#n').val(response.numero).addClass('input-valid');
                }
            }
        });
    });
        
    $("#cep").blur(function () {


        if ($(this).val().length == 8) {


            if (verifyCepStatus == 'error') {
                $('#cep').addClass('input-invalid');
                $('label#cep-error').remove();
                $('.cep-form-group').append('<label id="cep-error" class="label-invalid mb-0" for="cep">Esse CEP não é válido.</label>');
            }

            if (verifyCep !== $(this).val()) {

                $('label#cep-error').remove();
                $('#cep').addClass('input-process');

                $('#address').attr('disabled', true);
                $('#bairro').attr('disabled', true);
                $('#state').attr('disabled', true);
                $('#city').attr('disabled', true);
                $('.submitButtonAddressForm').attr('disabled', true);

                verifyCep = $(this).val();

                $.ajax({
                    type: "GET",
                    url: 'https://viacep.com.br/ws/' + verifyCep + '/json',
                    dataType: "JSON",
                    success: function (response) {
                        if (response.erro == true) {
                            verifyCepStatus = 'error';
                        } else {
                            verifyCepStatus = 'success';
                            cepData = response;
                        }
                    },
                    complete: function (jqXHR, textStatus) {

                        if (verifyCepStatus == 'success') {
                            $.ajax({
                                type: "GET",
                                url: domain + '/calc/frete',
                                data: {cep: $('#cep').val()},
                                dataType: "JSON",
                                success: function (response) {

                                    sessionStorage.setItem('valorFrete', response.valorFrete);
                                    sessionStorage.setItem('prazoFrete', response.prazoFrete);

                                    cupomDesconto = sessionStorage.getItem('cupomDesconto');

                                    if ($('#dadosFrete').hasClass('d-none')) {
                                        $('#dadosFrete').removeClass('d-none');
                                        $('#prazoFrete').text('Frete (prazo de ' + response.prazoFrete + ' dias)');
                                        $('#valorFrete').text('R$ ' + (response.valorFrete).toString().replace('.', ','));
                                    } else {
                                        $('#prazoFrete').text('Frete (prazo de ' + response.prazoFrete + ' dias)');
                                        $('#valorFrete').text('R$ ' + (response.valorFrete).toString().replace('.', ','));
                                    }

                                    if (cupomDesconto != 'null') {
                                        $('#totalOpcao').text('Total (c/ frete e desconto)');
                                        let desconto = parseFloat(total_carrinho) * cupomDesconto;
                                        $('#totalCart').text('R$ ' + ((parseFloat(total_carrinho) - desconto) + response.valorFrete).toFixed(2).toString().replace('.', ','));
                                    } else {
                                        $('#totalOpcao').text('Total (c/ frete)');
                                        $('#totalCart').text('R$ ' + (parseFloat(total_carrinho) + response.valorFrete).toFixed(2).toString().replace('.', ','));
                                    }
                                    validarCep(true);
                                    mostrarDadosCep(cepData);
                                    $('.submitButtonAddressForm').attr('disabled', false);
                                }
                            });
                        } else {
                            validarCep(false);
                            $('#address').attr('disabled', false);
                            $('#bairro').attr('disabled', false);
                            $('#state').attr('disabled', false);
                            $('#city').attr('disabled', false);


                            if (cepData.logradouro !== "" && cepData.bairro !== "") {
                                $('#address').val('');
                                $('#bairro').val('');
                                $('#state').val('');
                                $('#city').val('');
                                $('#address').removeClass('input-valid');
                                $('#bairro').removeClass('input-valid');
                                $('#state').removeClass('input-valid');
                                $('#city').removeClass('input-valid');
                            } else {
                                $('#state').val('');
                                $('#city').val('');
                                $('#state').removeClass('input-valid');
                                $('#city').removeClass('input-valid');
                            }
                            $('.submitButtonAddressForm').attr('disabled', false);
                        }
                    }
                });
            }
        }
    });

    function validarCep(statusValidation) {
        if (statusValidation) {
            $('label#cep-error').remove();
            $('#cep').removeClass('input-invalid');
            $('#cep').removeClass('input-process');
            $('#cep').addClass('input-valid');
            $('#cep').data('check', 'valid');
        } else {
            $('label#cep-error').remove();
            $('#cep').removeClass('input-valid');
            $('#cep').removeClass('input-process');
            $('#cep').addClass('input-invalid');
            $('.cep-form-group').append('<label id="cep-error" class="label-invalid mb-0" for="cep">Esse CEP não é válido.</label>');
            $('#cep').data('check', 'invalid');

        }
    }

    function mostrarDadosCep(cepData) {
        $('#address').attr('disabled', false);
        $('#bairro').attr('disabled', false);
        $('#state').attr('disabled', false);
        $('#city').attr('disabled', false);

        if (cepData.logradouro !== "" & cepData.bairro !== "") {
            $('#address').val(cepData.logradouro).addClass('input-valid');
            $('#bairro').val(cepData.bairro).addClass('input-valid');
            $('#state').val(cepData.uf).addClass('input-valid');
            $('#city').val(cepData.localidade).addClass('input-valid');
        } else {
            $('#state').val(cepData.uf).addClass('input-valid');
            $('#city').val(cepData.localidade).addClass('input-valid');
        }
    }



    $('#submitButtonAddressForm').click(function () {
        $('#cep').focus();
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
    $('#addressCheckoutForm').validate({
        submitHandler: function (form) {


            if ($('#cep').data('check') == 'valid') {
                sessionStorage.setItem($('#cep').val());
                form.submit();
            }
            if ($('#cep').data('check') == 'invalid') {
                $('#cep').focus();
                $('#cep').removeClass('input-valid');
                $('#cep').addClass('input-invalid');
                $('label#cep-error').remove();
                $('.cep-form-group').append('<label id="cep-error" class="label-invalid mb-0" for="cep">Esse CEP não é válido.</label>');
            }

        },
        invalidHandler: function (event, validator) {
            if ($('#cep').data('check') == 'invalid') {
                $('#cep').focus();
                $('#cep').removeClass('input-valid');
                $('#cep').addClass('input-invalid');
                $('label#cep-error').remove();
                $('.cep-form-group').append('<label id="cep-error" class="label-invalid mb-0" for="cep">Esse CEP não é válido.</label>');
            }

        },
        rules: {
            cep: {
                required: true,
                minlength: 8,
                maxlength: 8
            },
            bairro: {
                required: true
            },
            address: {
                required: true
            },
            n: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            }
        },
        messages: {
            cep: {
                required: 'Esse campo é obrigatório.',
                minlength: 'O CEP deve conter 8 caracteres',
                maxlength: 'O CEP deve conter apenas 8 caracteres'
            },
            bairro: {
                required: 'Esse campo é obrigatório.'
            },
            address: {
                required: 'Esse campo é obrigatório.'
            },
            n: {
                required: 'Esse campo é obrigatório.'
            },
            state: {
                required: 'Esse campo é obrigatório.'
            },
            city: {
                required: 'Esse campo é obrigatório.'
            }
        }
    });

    $('#botaoCupom').click(function(){
        var cupom_name = $('#cupomValue').val().toUpperCase();

        $('#botaoCupomLabel').remove();
        $('#botaoCupom').attr('disabled', true);
    
        $('#botaoCupom').html('<div class="spinner-border text-light" id="botaoCupomLabel" role="status"><span class="sr-only">Calculando...</span></div>')

        $.ajax({
            type: "GET",
            url: domain + "/cupom/validate/" + cupom_name,
            dataType: "JSON",
            
            success: function (response) {
                if (response.status == 'success') {
                    $('.cupomTr').removeClass('d-none');
                    $('#cupomText').text("(" + response.cupom_name + ")");
                    $('#descontoPorcentagem').text("- " + (response.cart_discount * 100) + "%");
                    $('#descontoValor').text("(R$ " + (response.cart_total - response.new_cart_total).toFixed(2).toString().replace('.', ',') + ")");

                    sessionStorage.setItem('cupomDesconto', response.cart_discount);
                    sessionStorage.setItem('cupomNome', response.cupom_name);

                    valorFrete = sessionStorage.getItem('valorFrete');

                    if (valorFrete == 'null') {
                        $('#totalOpcao').text('Total (c/ desconto)');
                        let desconto = parseFloat(total_carrinho) * response.cart_discount;
                        $('#totalCart').text('R$ ' + (parseFloat(total_carrinho) - desconto).toFixed(2).toString().replace('.', ','));
                    } else {
                        $('#totalOpcao').text('Total (c/ frete e desconto)');
                        let desconto = parseFloat(total_carrinho) * response.cart_discount;
                        $('#totalCart').text('R$ ' + ((parseFloat(total_carrinho) - desconto) + parseFloat(valorFrete)).toFixed(2).toString().replace('.', ','));
                    }

                    $('#alertSuccess').removeClass('d-none');
                    $('#alertSuccess').text(response.message);

                    $('#botaoCupomLabel').remove();
                    $('#botaoCupom').attr('disabled', false);
    
                    $('#botaoCupom').html('<span class="mdc-button__label" id="botaoCupomLabel">Calcular</span>');
            
                    setTimeout(() => {
                        $('#alertSuccess').addClass('d-none');
                    }, 5000);
                } 
                if(response.status == 'error') {
                    $('.cupomTr').addClass('d-none');
                    $('#alertError').removeClass('d-none');
                    $('#alertError').text(response.message);

                    sessionStorage.setItem('cupomDesconto', null);
                    sessionStorage.setItem('cupomNome', null);

                    $('#botaoCupomLabel').remove();
                    $('#botaoCupom').attr('disabled', false);
    
                    $('#botaoCupom').html('<span class="mdc-button__label" id="botaoCupomLabel">Calcular</span>');

                    setTimeout(() => {
                        $('#alertError').addClass('d-none');
                    }, 5000);
                    
                }
            }
        });
    });
    
});