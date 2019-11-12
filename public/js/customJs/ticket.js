$(document).ready(function() {
  $('.tickets-accordions-header').click(function(e) {
    let ticket = $(e.target).parents('.tickets-accordions').data('ticket');
    $('#ticket' + ticket + '-accordion-collapse').collapse('toggle');
  });
});