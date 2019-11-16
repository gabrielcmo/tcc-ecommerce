$(document).ready(function() {
  $('.ratings-accordions-header').click(function(e) {
    let rating = $(e.target).parents('.ratings-accordions').data('rating');
    $('#rating' + rating + '-accordion-collapse').collapse('toggle');
  });
});