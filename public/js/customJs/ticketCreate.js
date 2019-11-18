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

  $('#ticketForm').validate({
    rules: {
      ticket_subject: {
        required: true,
        maxlength: 60
      },
      ticket_type: {
        required: true
      },
      ticket_message: {
        required: true,
        maxlength: 200
      }
    },
    messages: {
      ticket_subject: {
        required: 'Esse campo é obrigatório.',
        maxlength: 'Você ultrapassou o limite de 100 caracteres.'
      },
      ticket_type: {
        required: 'Esse campo é obrigatório.'
      },
      ticket_message: {
        required: 'Esse campo é obrigatório.',
        maxlength: 'Você ultrapassou o limite de 200 caracteres.'
      }
    }
  });
});