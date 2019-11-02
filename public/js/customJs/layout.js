const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.querySelector('.mdc-top-app-bar'));
const buttons = document.querySelectorAll('.mdc-button');
const textsFields = document.querySelectorAll('.mdc-text-field');

textsFields.forEach(textField => {
  mdc.textField.MDCTextField.attachTo(textField);
});
buttons.forEach(button => {
  mdc.ripple.MDCRipple.attachTo(button);
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
      
    } else {
      $('#topAppBar').removeClass('mdc-top-app-bar--short-collapsed');
    } 
  }
  
  var windowWidth = $(window).width();
  sessionStorage.setItem('windowWidth', windowWidth); 

  if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
    $('#sidebarMenu, #sidebarMenuButton').removeClass('d-none');
    $('#dropdown').addClass('d-none');
    $('#topAppBar2').addClass('d-none');
    $('#searchForm').addClass('d-none');
    $('#topAppBar').removeClass('mdc-top-app-bar--fixed');
    $('#topAppBar').addClass('mdc-top-app-bar--short');
    $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '0');
    $('#cartButton').css('margin-right', '5px');
    $('#imgLogo').css('width', '100px');
  }

  if ( windowWidth >= 992 ) {
    $('#sidebarMenu, #sidebarMenuButton').addClass('d-none');
    $('#sidebarMenu').removeClass('mdc-drawer--open');
    $('#dropdown').removeClass('d-none');
    $('#searchForm').removeClass('d-none');
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
      $('#searchForm').addClass('d-none');
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
      $('#searchForm').removeClass('d-none');
      $('#topAppBar2').removeClass('d-none');
      $('#topAppBar').removeClass('mdc-top-app-bar--short mdc-top-app-bar--short-collapsed');
      $('#topAppBar').addClass('mdc-top-app-bar--fixed');
      $('#topAppBar .mdc-top-app-bar__section--align-end').css('margin-right', '5%');
    }
  });

  $('.actionButton').click(function(){
    var route = $(this).data('href');
    window.location.href = route;
  });
  $('.support-tab-header').click(function() {
    let height = $(this).height();
    if (height == '32') {
      $('.support-tab-content').animate({
        height: '430px'
      });
      $('.support-tab-header').animate({
        height: '462px'
      });
    } else {
      $('.support-tab-content').animate({
        height: '0px'
      });
      $('.support-tab-header').animate({
        height: '32px'
      });
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