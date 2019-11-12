$(document).ready(function() {
  $('.tickets-accordions-header').click(function(e) {
    let ticket = $(e.target).parents('.tickets-accordions').data('ticket');
    $('#ticket' + ticket + '-accordion-collapse').collapse('toggle');
  });
  
  var windowWidth = sessionStorage.getItem('windowWidth')

  if (windowWidth < 992) {
    $('#ticket-data-header').removeClass('d-flex');
    $('#ticket-data-header').addClass('d-none');
  }

  if ( windowWidth >= 992 ) {
    $('#ticket-data-header').addClass('d-flex');
    $('#ticket-data-header').removeClass('d-none');
  }
  
  $(window).resize(function(){
    var windowWidth = $(window).width();

    if (windowWidth < 992) {
      $('#ticket-data-header').removeClass('d-flex');
      $('#ticket-data-header').addClass('d-none');
    }

    if ( windowWidth >= 992 ) {
      $('#ticket-data-header').addClass('d-flex');
      $('#ticket-data-header').removeClass('d-none');
    }
  });

});