const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.querySelector('.mdc-top-app-bar'));
const textsFields = document.querySelectorAll('.mdc-text-field');
const selector = '.mdc-button, .mdc-icon-button, .mdc-fab';
const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
  return mdc.ripple.MDCRipple.attachTo(el);
});

textsFields.forEach(textField => {
  mdc.textField.MDCTextField.attachTo(textField);
});

topAppBar.setScrollTarget(document.getElementById('main-content'));
topAppBar.listen('MDCTopAppBar:nav', () => {
  drawer.open = !drawer.open;
});

$(document).ready(function(){
  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if ($('#topAppBar').hasClass('mdc-top-app-bar--short')) {
      closeNav(scroll)
    }
    if ($('#topAppBar').hasClass('mdc-top-app-bar--short-collapsed')) {
      $('#topAppBar').css('width', '125px');
    } else {
      $('#topAppBar').css('width', '100%');
    }

    $('#sidebarMenu').removeClass('mdc-drawer--open');
  });
  
  function closeNav(scroll) {
    if (scroll > 80) {
      $('#topAppBar').addClass('mdc-top-app-bar--short-collapsed');
      $('#searchFormCellphone').addClass('d-none');
    } else {
      $('#topAppBar').removeClass('mdc-top-app-bar--short-collapsed');
      $('#searchFormCellphone').removeClass('d-none');
    } 
  }
  
  var windowWidth = $(window).width();
  sessionStorage.setItem('windowWidth', windowWidth); 

  if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
    $('#sidebarMenu, #sidebarMenuButton').removeClass('d-none');
    $('#dropdown').addClass('d-none');
    $('#topAppBar2').addClass('d-none');
    $('#searchFormPc').addClass('d-none');
    $('#searchFormCellphone').removeClass('d-none');
    $('#topAppBar').removeClass('mdc-top-app-bar--fixed');
    $('#topAppBar').addClass('mdc-top-app-bar--short');
    $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '0');
    $('#cartButton').css('margin-right', '5px');
    $('#imgLogo').css('width', '100px');
    $('#supportButtonPc').addClass('d-none');
    $('#fastMenuButton').removeClass('d-none');
    $('#fastSupportButton').removeClass('d-none');
    $('#fastSearchButton').removeClass('d-none');
  }

  if ( windowWidth >= 992 ) {
    $('#sidebarMenu, #sidebarMenuButton').addClass('d-none');
    $('#sidebarMenu').removeClass('mdc-drawer--open');
    $('#dropdown').removeClass('d-none');
    $('#searchFormPc').removeClass('d-none');
    $('#searchFormCellphone').addClass('d-none');
    $('#topAppBar2').removeClass('d-none');
    $('#topAppBar').removeClass('mdc-top-app-bar--short mdc-top-app-bar--short-collapsed');
    $('#topAppBar').addClass('mdc-top-app-bar--fixed');
    $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '5%');
  }
  
  $(window).resize(function(){
    var windowWidth = $(window).width();

    if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
      $('#sidebarMenu, #sidebarMenuButton').removeClass('d-none');
      $('#dropdown').addClass('d-none');
      $('#searchFormPc').addClass('d-none');
      $('#searchFormCellphone').removeClass('d-none');
      $('#topAppBar').removeClass('mdc-top-app-bar--fixed');
      $('#topAppBar2').addClass('d-none');
      $('#topAppBar').addClass('mdc-top-app-bar--short');
      $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '0');
      $('#imgLogo').css('width', '100px');
    }

    if ( windowWidth >= 992 ) {
      $('#sidebarMenu, #sidebarMenuButton').addClass('d-none');
      $('#sidebarMenu').removeClass('mdc-drawer--open');
      $('#dropdown').removeClass('d-none'); 
      $('#searchFormPc').removeClass('d-none');
      $('#searchFormCellphone').addClass('d-none');
      $('#topAppBar2').removeClass('d-none');
      $('#topAppBar').removeClass('mdc-top-app-bar--short mdc-top-app-bar--short-collapsed');
      $('#topAppBar').addClass('mdc-top-app-bar--fixed');
      $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '5%');
      $('#supportButtonPc').removeClass('d-none');
      $('#fastMenuButton').addClass('d-none');
      $('#fastSupportButton').addClass('d-none');
      $('#fastSearchButton').addClass('d-none');

    }
  });

  $('.actionButton').click(function(){
    var route = $(this).data('href');
    window.location.href = route;
  });

  $('#fastMenuButton').click(function() {
    $('#fastSupportButton').fadeToggle('fast', 'linear');
    $('#fastSearchButton').fadeToggle('fast', 'linear');

    if ($('#fastMenuButtonIcon').hasClass('fa-bars')) {
      $('#fastMenuButtonIcon').removeClass('fa-bars');
      $('#fastMenuButtonIcon').addClass('fa-times');
    } else {
      $('#fastMenuButtonIcon').removeClass('fa-times');
      $('#fastMenuButtonIcon').addClass('fa-bars');
    }
  });

  $('#fastSearchButton').click(function() {
    $('.input-search-sm-devices').removeClass('d-none');
    $('.mdc-drawer-scrim').show();
    $('.mdc-drawer-scrim').addClass('show');
  });

  $('.mdc-drawer-scrim').click(function (e) {
    if ($('.mdc-drawer-scrim').hasClass('show')) {
      if ($(e.target).hasClass('mdc-drawer-scrim')) {
        $('.mdc-drawer-scrim').hide();
        $('.input-search-sm-devices').addClass('d-none');
      }
    }
  });
  
});




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
$('#loginDropdownForm').validate({
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
      required: 'Esse campo é obrigatório',
      email: 'Esse não é um endereço de email válido.'
    },
    password: {
      required: 'Esse campo é obrigatório.'
    }
  }
});
$('#supportTabForm').validate({
  rules : {
    contact_email: {
      required: true,
      email: true
    },
    subject: {
      required: true
    },
    support_message: {
      required: true,
      maxlength: 250
    }
  },
  messages: {
    contact_email: {
      required: 'Esse campo é obrigatório',
      email: 'Esse não é um endereço de email válido.'
    },
    subject: {
      required: 'Esse campo é obrigatório'
    },
    support_message: {
      required: 'Esse campo é obrigatório',
      maxlength: 'O máximo de caracteres permitido é 250'
    }
  }
});