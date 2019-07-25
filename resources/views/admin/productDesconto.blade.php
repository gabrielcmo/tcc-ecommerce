<form action="/admin/product/desconto/" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product_id}}"><br>
    <input type="number" name="desconto" id="" placeholder="Insira o valor em porcentagem de desconto"><br>
    <input type="submit" value="Enviar">
</form>