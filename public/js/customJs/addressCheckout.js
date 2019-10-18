$(document).ready(function () {
    var domain = document.location.host;
    if (domain == "www.doomus.com.br") {
        domain = "www.doomus.com.br/public";
    }
    var verifyCep, verifyCepStatus, cepData;
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

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "http://" + domain + "/checkout/address/cep",
                    data: { query: verifyCep },
                    dataType: "JSON",
                    success: function (response) {

                        if (response.textStatus == 'error') {
                            verifyCepStatus = 'error';
                        } else {
                            verifyCepStatus = 'success';
                            cepData = response;
                        }
                    },
                    complete: function (jqXHR, textStatus) {

                        if (verifyCepStatus == 'success') {
                            validarCep(true);
                            mostrarDadosCep(cepData);
                            $('.submitButtonAddressForm').attr('disabled', false);
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
        var cupom = $('#cupomValue').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "http://" + domain + "/cupom/validate",
            data: { queryCupom: cupom },
            dataType: "JSON",
            success: function (response) {
                if (response.textStatus == 'success') {
                    $('#cupomTr').removeClass('d-none');
                    $('#cupomText').text("("+response.cupom.name+")");
                    $('#totalDesconto').text("-"+response.cupom.desconto+"%");
                    let val = ((1 - (response.cupom.desconto / 100)) * response.cartTotal).toFixed(2);
                    $('#totalCart').text("R$ "+ val);
                }
                console.log(response);
            }
        });
    });
});