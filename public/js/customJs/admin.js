$(document).ready(function() {
  $.validator.setDefaults({
    errorClass: 'label-invalid mb-0',
    highlight: function (element) {
        $(element).removeClass('input-valid');
        $(element).addClass('input-invalid');
    },
    unhighlight: function (element) {
        $(element).removeClass('input-invalid');
        $(element).addClass('input-valid');
    }
  });

  $('#ticketResponseForm').validate({
    rules: {
      response_message: {
        required: true
      }
    },
    messages: {
      response_message: {
        required: 'Esse campo é obrigatório.'
      }
    }
  });

  $('#productAddForm').validate({
    rules: {
      nome: {
        required: true,
        maxlength: 60
      },
      descricao: {
        required: true,
        maxlength: 200
      },
      qtd_restante: {
        required: true
      },
      peso: {
        required: true
      },
      comprimento: {
        required: true
      },
      largura: {
        required: true
      },
      altura: {
        required: true
      },
      valor: {
        required: true
      },
      categoria_id: {
        required: true
      }
    },
    messages: {
      nome: {
        required: 'Esse campo é obrigatório.',
        maxlength: 'Você ultrapassou o limite de 60 caracteres.'
      },
      descricao: {
        required: 'Esse campo é obrigatório.',
        maxlength: 'Você ultrapassou o limite de 200 caracteres.'
      },
      qtd_restante: {
        required: 'Esse campo é obrigatório.'
      },
      peso: {
        required: 'Esse campo é obrigatório.'
      },
      comprimento: {
        required: 'Esse campo é obrigatório.'
      },
      largura: {
        required: 'Esse campo é obrigatório.'
      },
      altura: {
        required: 'Esse campo é obrigatório.'
      },
      valor: {
        required: 'Esse campo é obrigatório.'
      },
      categoria_id: {
        required: 'Esse campo é obrigatório.'
      }
    }
  });
}); 