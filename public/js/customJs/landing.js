$(document).ready(function(){
  const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
  const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
    return mdc.ripple.MDCRipple.attachTo(el);
  });
  
  var domain = document.location.host;

  if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
    domain = "https://www.doomus.com.br/public";
  } else {
    domain = 'http://localhost:8000';
  }

  $('.product-card-action').click(function (e){
    let product_id = $(this).data('id');
    window.location.href = domain + "/produto/" + product_id; 
  });

  $('#toggleSearchBarButton').click(function() {
    $('.input-search-sm-devices').removeClass('d-none');
    $('.mdc-drawer-scrim').show();
    $('.mdc-drawer-scrim').addClass('show');
  });

  console.log($('.cards-row1').children().length)
  var carousel_deleted_col_row1 = new Array(), carousel_deleted_col_row2 = new Array(), carousel_deleted_col_row3 = new Array();


  

  var windowWidth = sessionStorage.getItem('windowWidth', windowWidth); 

  if ((windowWidth >= 576 && windowWidth < 768) || (windowWidth < 576)) {
    // SM e XS
    $('.cards-row1 div:nth-child(4)').addClass('d-none');
    $('.cards-row1 div:nth-child(3)').addClass('d-none');
    $('.cards-row1 div:nth-child(2)').addClass('d-none');

    $('.cards-row2 div:nth-child(4)').addClass('d-none');
    $('.cards-row2 div:nth-child(3)').addClass('d-none');
    $('.cards-row2 div:nth-child(2)').addClass('d-none');

    $('.cards-row3 div:nth-child(4)').addClass('d-none');
    $('.cards-row3 div:nth-child(3)').addClass('d-none');
    $('.cards-row3 div:nth-child(2)').addClass('d-none');
  } else if (windowWidth >= 768 && windowWidth < 992) {
    // MD
    $('.cards-row1 div:nth-child(4)').addClass('d-none');
    $('.cards-row1 div:nth-child(3)').addClass('d-none');

    $('.cards-row2 div:nth-child(4)').addClass('d-none');
    $('.cards-row2 div:nth-child(3)').addClass('d-none');

    $('.cards-row3 div:nth-child(4)').addClass('d-none');
    $('.cards-row3 div:nth-child(3)').addClass('d-none');
  } else if (windowWidth >= 992 && windowWidth < 1200) {
    // LG
    $('.cards-row1 div:nth-child(4)').addClass('d-none');

    $('.cards-row2 div:nth-child(4)').addClass('d-none');

    $('.cards-row3 div:nth-child(4)').addClass('d-none');
  }

  $(window).resize(function(){
    var windowWidth = $(window).width();

    if ((windowWidth >= 576 && windowWidth < 768) || (windowWidth < 576)) {
      // SM e XS
    $('.cards-row1 div:nth-child(4)').addClass('d-none');
    $('.cards-row1 div:nth-child(3)').addClass('d-none');
    $('.cards-row1 div:nth-child(2)').addClass('d-none');

    $('.cards-row2 div:nth-child(4)').addClass('d-none');
    $('.cards-row2 div:nth-child(3)').addClass('d-none');
    $('.cards-row2 div:nth-child(2)').addClass('d-none');

    $('.cards-row3 div:nth-child(4)').addClass('d-none');
    $('.cards-row3 div:nth-child(3)').addClass('d-none');
    $('.cards-row3 div:nth-child(2)').addClass('d-none');
    } else if (windowWidth >= 768 && windowWidth < 992) {
      // MD
    $('.cards-row1 div:nth-child(4)').addClass('d-none');
    $('.cards-row1 div:nth-child(3)').addClass('d-none');
    $('.cards-row1 div:nth-child(2)').removeClass('d-none');

    $('.cards-row2 div:nth-child(4)').addClass('d-none');
    $('.cards-row2 div:nth-child(3)').addClass('d-none');
    $('.cards-row2 div:nth-child(2)').removeClass('d-none');

    $('.cards-row3 div:nth-child(4)').addClass('d-none');
    $('.cards-row3 div:nth-child(3)').addClass('d-none');
    $('.cards-row3 div:nth-child(2)').removeClass('d-none');

    } else if (windowWidth >= 992 && windowWidth < 1200) {
      // LG

      $('.cards-row1 div:nth-child(4)').addClass('d-none');
      $('.cards-row1 div:nth-child(3)').removeClass('d-none');
      $('.cards-row1 div:nth-child(2)').removeClass('d-none');
  
      $('.cards-row2 div:nth-child(4)').addClass('d-none');
      $('.cards-row2 div:nth-child(3)').removeClass('d-none');
      $('.cards-row2 div:nth-child(2)').removeClass('d-none');
  
      $('.cards-row3 div:nth-child(4)').addClass('d-none');
      $('.cards-row3 div:nth-child(3)').removeClass('d-none');
      $('.cards-row3 div:nth-child(2)').removeClass('d-none');

    } else {
      // XL
      
      $('.cards-row1 div:nth-child(4)').removeClass('d-none');
      $('.cards-row1 div:nth-child(3)').removeClass('d-none');
      $('.cards-row1 div:nth-child(2)').removeClass('d-none');
  
      $('.cards-row2 div:nth-child(4)').removeClass('d-none');
      $('.cards-row2 div:nth-child(3)').removeClass('d-none');
      $('.cards-row2 div:nth-child(2)').removeClass('d-none');
  
      $('.cards-row3 div:nth-child(4)').removeClass('d-none');
      $('.cards-row3 div:nth-child(3)').removeClass('d-none');
      $('.cards-row3 div:nth-child(2)').removeClass('d-none');
    }
  });
});
