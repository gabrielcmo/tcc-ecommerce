$(document).ready(function(){
    $('#faqLink').click(function() {
        $('#faq').removeClass('d-none');
        $('#faqLink').addClass('active');
        $('#howToUseLink').removeClass('active');
        $('#howToUse').addClass('d-none');
    });

    $('#howToUseLink').click(function() {
        $('#faq').addClass('d-none');
        $('#howToUseLink').addClass('active');
        $('#faqLink').removeClass('active');
        $('#howToUse').removeClass('d-none');
    });
});