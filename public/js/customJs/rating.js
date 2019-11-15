$(document).ready(function() {

  var star_note;

  var domain = document.location.host;
  if (domain == 'www.doomus.com.br' || domain == 'doomus.com.br') {
    domain = 'www.doomus.com.br/public';
  }

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

  $('#selectProduct').change(function (e) {
    let product_id = $(this).val();
    $.ajax({
      type: "GET",
      url: '/product/rating',
      data: {product_id:product_id},
      dataType: "JSON",
      complete: function (response) {
        let product_rating = response.responseJSON;
        console.log(product_rating);
        $('#title').val(product_rating.title);
        $('#description-text').text(product_rating.text);
        var star_note = product_rating.note;
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
});