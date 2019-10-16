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

$('#loginForm').validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password: {
      required: true
    }
  },
  messages: {
    email: {
      required: 'Esse campo é obrigatório.',
      email: 'Esse não é um endereço de email válido.'
    },
    password: {
      required: 'Esse campo é obrigatório.'
    }
  }
});

$('#registerForm').validate({
  rules: {
    name: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    password: {
      required: true,
      minlength: 8
    },
    password_confirmation: {
      required: true,
      equalTo: '#password'
    }
  },
  messages: {
    name: {
      required: 'Esse campo é obrigatório.'
    },
    email: {
      required: 'Esse campo é obrigatório.',
      email: 'Esse não é um endereço de email válido.'
    },
    password: {
      required: 'Esse campo é obrigatório.',
      minlength: 'Sua senha deve ter no mínimo 8 caracteres.'
    },
    password_confirmation: {
      required: 'Esse campo é obrigatório.',
      equalTo: 'Insira a mesma senha do campo anterior.'
    }
  }
});