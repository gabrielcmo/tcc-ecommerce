$(document).ready(function(){

  var domain = document.location.host;
  if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
      domain = "https://www.doomus.com.br/public";
  } else {
      domain = "http://localhost:8000";
  }

  $('#itensModal').on('shown.bs.modal', function(e){


    $('.inputQty').change(function(e){
      e.preventDefault();

      let product = $(e.target).data('product');
      let productValue = $('.productValue'+product).text().substring(2).replace(',', '.');
      let qty = $(e.target).val();
      let productRowId = $('.productRowId'+product).text();
      let productId = $('.productId'+product).text()
  
      let newValue = (productValue*qty).toFixed(2).replace('.', ',');

      var qtyTotal = 0;
      $('.inputQty').each(function (){
        qtyTotal += Number($(this).val());
      });
      $('#countCart').text(qtyTotal);
  
      $('.newProductValue'+product).data('value', parseFloat(newValue.replace(',', '.')));
      $('.newProductValue'+product).text('R$ ' + newValue);
  
      let total = 0;
      $('.eachProductValue').each(function () {
        total += $(this).data('value');
        
      });
      $('#totalCart').text("R$ "+total.toFixed(2).replace('.',','));

      

      $('#modalButton').attr('disabled', true);
      $('#modalButton').removeClass('bg-success');
      $('#modalButton').addClass('bg-warning');
      $('#modalButtonLabel').text('Processando...');
      $('#botaoFecharModal').attr('disabled', true);
      
      var ajaxRequest = $.ajax({
        type: "GET",
        url: domain + "/carrinho/" + productRowId + "/" + qty + "/" + productId,
        
        complete: function (jqXHR, textStatus){
          if(textStatus == 'success') {
            $('#modalButton').attr('disabled', false);
            $('#botaoFecharModal').attr('disabled', false);
            $('#modalButton').removeClass('bg-warning');
            $('#modalButton').addClass('bg-success');
            $('#modalButtonLabel').text('Alterar');
          }
        }
      });
      $('#botaoFecharModal').click(function (){
        ajaxRequest.abort();
      });
    });
  });
  $('#itensModal').on('hidden.bs.modal', function(e){
    let total = 0;
    $('.eachProductValue').each(function () {
      total += $(this).data('value');
    });

    let desconto = sessionStorage.getItem('cupomDesconto');

    desconto *= total;

    total -= desconto;
    total += parseFloat($('#valorFrete').data('frete'));

    $('#valorTotalCompra').text('R$ ' + total.toFixed(2).toString().replace('.', ','));
    
  });

});