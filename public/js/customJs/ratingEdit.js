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

  $('#ratingEditForm').validate({
    rules: {
      title_rating: {
        maxlength: 50,
        minlength: 20
      },
      description_text: {
        maxlength: 200,
        minlength: 100
      }
    },
    messages: {
      title_rating: {
        maxlength: 'Você ultrapassou o limite de 50 caracteres.',
        minlength: 'Insira pelo menos 20 caracteres.'
      },
      description_text: {
        maxlength: 'Você ultrapassou o limite de 200 caracteres.',
        minlength: 'Insira pelo menos 100 caracteres.'
      }
    }
  });


  var note = $('#new-note').val();

  switch (note) {
    case '1':
      $('.star-1').css('color', 'gold');
      break;
    case '2':
      $('.star-1, .star-2').css('color', 'gold');
      break;
    case '3':
      $('.star-1, .star-2, .star-3').css('color', 'gold');
        break;
    case '4':
      $('.star-1, .star-2, .star-3, .star-4').css('color', 'gold');
        break;
    case '5':
      $('.star-1, .star-2, .star-3, .star-4, .star-5').css('color', 'gold');
        break;
    default:
      break;
  }

  var star_note;
  
  $('.star-1').mouseenter(function() {
    if ($(this).hasClass('star-clicked')) {
      $(this).removeClass('star-clicked');
    }

    if ($('.star-2, .star-3, .star-4, .star-5').hasClass('star-selected')) {
      $('.star-2, .star-3, .star-4, .star-5').removeClass('star-selected');
    }

    $(this).addClass('star-selected');
  }).mouseleave(function() {


    if (!$(this).hasClass('star-clicked')) {
      $(this).removeClass('star-selected');
    }
  });

  $('.star-2').mouseenter(function() {

    if ($(this).hasClass('star-clicked')) {
      $(this).removeClass('star-clicked');
    }

    if ($('.star-3, .star-4, .star-5').hasClass('star-selected')) {
      $('.star-3, .star-4, .star-5').removeClass('star-selected');
    }

    $('.star-1').addClass('star-selected');
    $(this).addClass('star-selected');
  }).mouseleave(function() {
    if (!$(this).hasClass('star-clicked')) {
      $('.star-1').removeClass('star-selected');
      $(this).removeClass('star-selected')
    }
  });
  
  $('.star-3').mouseenter(function() {
    if ($(this).hasClass('star-clicked')) {
      $(this).removeClass('star-clicked');
    }

    if ($('.star-4, .star-5').hasClass('star-selected')) {
      $('.star-4, .star-5').removeClass('star-selected');
    }
    
    $('.star-1').addClass('star-selected');
    $('.star-2').addClass('star-selected');
    $(this).addClass('star-selected');
  }).mouseleave(function() {
    if (!$(this).hasClass('star-clicked')) {
      $('.star-1').removeClass('star-selected');
      $('.star-2').removeClass('star-selected');
      $(this).removeClass('star-selected');
    }
  });
  
  $('.star-4').mouseenter(function() {
    if ($(this).hasClass('star-clicked')) {
      $(this).removeClass('star-clicked');
    }
    
    if ($('.star-5').hasClass('star-selected')) {
      $('.star-5').removeClass('star-selected');
    }
    
    $('.star-1').addClass('star-selected');
    $('.star-2').addClass('star-selected');
    $('.star-3').addClass('star-selected');
    $(this).addClass('star-selected');
    
  }).mouseleave(function() {
    if (!$(this).hasClass('star-clicked')) {
      $('.star-1').removeClass('star-selected');
      $('.star-2').removeClass('star-selected');
      $('.star-3').removeClass('star-selected');
      $(this).removeClass('star-selected');
    }
  });
  
  $('.star-5').mouseenter(function() {
    if ($(this).hasClass('star-clicked')) {
      $(this).removeClass('star-clicked');
    }
    $('.star-1').addClass('star-selected');
    $('.star-2').addClass('star-selected');
    $('.star-3').addClass('star-selected');
    $('.star-4').addClass('star-selected');
    $(this).addClass('star-selected');
  }).mouseleave(function() {
    if (!$(this).hasClass('star-clicked')) {
      $('.star-1').removeClass('star-selected');
      $('.star-2').removeClass('star-selected');
      $('.star-3').removeClass('star-selected');
      $('.star-4').removeClass('star-selected');
      $(this).removeClass('star-selected');
    }
  });
  
  

  
  $('.star-1').click(function() {
    $(this).addClass('star-selected');
    $(this).addClass('star-clicked');
    $('#new-note').val(1);
    star_note = 1;
  });
  
  $('.star-2').click(function() {
    $('star-1').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#new-note').val(2);
    star_note = 2;
  });
  
  $('.star-3').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#new-note').val(3);
    star_note = 3;
  });
  
  $('.star-4').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $('star-3').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#new-note').val(4);
    star_note = 4;
  });
  
  $('.star-5').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $('star-3').addClass('star-selected');
    $('star-4').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#new-note').val(5);
    star_note = 5;
  });


  $('.stars-rating').mouseleave(function () {
    if (star_note !== undefined) {
      if (star_note === 1) {
        $('.star-1').addClass('star-selected');
      } else if (star_note === 2) {
        $('.star-1').addClass('star-selected');
        $('.star-2').addClass('star-selected');
      } else if (star_note === 3) {
        $('.star-1').addClass('star-selected');
        $('.star-2').addClass('star-selected');
        $('.star-3').addClass('star-selected');
      } else if (star_note === 4) {
        $('.star-1').addClass('star-selected');
        $('.star-2').addClass('star-selected');
        $('.star-3').addClass('star-selected');
        $('.star-4').addClass('star-selected');
      } else {
        $('.star-1').addClass('star-selected');
        $('.star-2').addClass('star-selected');
        $('.star-3').addClass('star-selected');
        $('.star-4').addClass('star-selected');
        $('.star-5').addClass('star-selected');
      }
    }
  });

});