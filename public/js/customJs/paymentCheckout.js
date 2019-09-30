$(document).ready(function(){
  $('#itensModal').on('shown.bs.modal', function(e){


    $('.inputQty').change(function(e){
      e.preventDefault();

      let product = $(e.target).data('product');
      let productValue = $('.productValue'+product).text().substring(2).replace(',', '.');
      let qty = parseInt($(e.target).val());
      let productRowId = $('.productRowId'+product).text();
      let productId = $('.productId'+product).text()
  
      let newValue = (productValue*qty).toFixed(2).replace('.', ',');
  
      $('.newProductValue'+product).data('value', parseFloat(newValue.replace(',', '.')));
      $('.newProductValue'+product).text('R$ ' + newValue);
  
      let total = 0;
      $('.eachProductValue').each(function () {
        // console.log($(this).data('value'));
        total += $(this).data('value');
        
      });
      $('#totalCart').text("R$ "+total.toFixed(2).replace('.',','));

      

      $('#modalButton').attr('disabled', true);
      $('#modalButton').removeClass('bg-success');
      $('#modalButton').addClass('bg-warning');
      $('#modalButtonLabel').text('Processando...');
      
      $.ajax({
        type: "GET",
        url: "/carrinho/" + productRowId + "/" + qty + "/" + productId,
        
        complete: function (jqXHR, textStatus){
          if(textStatus == 'success') {
            $('#modalButton').attr('disabled', false);
            $('#modalButton').removeClass('bg-warning');
            $('#modalButton').addClass('bg-success');
            $('#modalButtonLabel').text('Alterar');
          }
        }
      });
    });
  });
  $('#itensModal').on('hidden.bs.modal', function(e){
    let total = 0;
    $('.eachProductValue').each(function () {
      total += $(this).data('value');
    });

    total += parseFloat($('#valorFrete').data('frete').replace(',', '.'));

    $('#valorTotalCompra').text('R$ ' + total.toFixed(2).toString().replace('.', ','));
    
  });
});