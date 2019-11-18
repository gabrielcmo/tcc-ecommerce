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

  $('#ratingForm').validate({
    rules: {
      product_id: {
        required: true,
      },
      title_rating: {
        required: true
      },
      description_text: {
        required: true,
        maxlength: 200
      }
    },
    messages: {
      product_id: {
        required: 'Esse campo é obrigatório.'
      },
      title_rating: {
        required: 'Esse campo é obrigatório.'
      },
      description_text: {
        required: 'Esse campo é obrigatório.',
        maxlength: 'Você ultrapassou o limite de 200 caracteres.'
      }
    }
  });

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
    $('#note-rating').val(1);
    star_note = 1;
  });
  
  $('.star-2').click(function() {
    $('star-1').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#note-rating').val(2);
    star_note = 2;
  });
  
  $('.star-3').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#note-rating').val(3);
    star_note = 3;
  });
  
  $('.star-4').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $('star-3').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#note-rating').val(4);
    star_note = 4;
  });
  
  $('.star-5').click(function() {
    $('star-1').addClass('star-selected');
    $('star-2').addClass('star-selected');
    $('star-3').addClass('star-selected');
    $('star-4').addClass('star-selected');
    $(this).addClass('star-clicked');
    $(this).addClass('star-selected');
    $('#note-rating').val(5);
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