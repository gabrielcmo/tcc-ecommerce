<?php use Gloudemans\Shoppingcart\Facades\Cart; ?>

@if(Cart::count() == 0)
    <h2>Seu carrinho está vazio!</h2>
@else
<a class="btn btn-danger" href="/carrinho/delete">Limpar carrinho</a><br><br>
<div class="row">
    <div class="col-md-9">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor unitário</th>
                    <th scope="col">Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::content() as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price*$item->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a class="btn btn-success" href="/checkout/endereco" onclick="displaySpinner();">
        <span style="display:none;" id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Fazer pedido
    </a>
    </div>
    <div class="col-md-3">
        <table class="table">
            <thead class="thead-dark ">
                <tr>
                    <th colspan="2" class="text-center">Pedido</th>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td>{{ Cart::subtotal() }}</td>
                </tr>
                <tr>
                    <th>Taxa</th>
                    <td>{{ Cart::tax() }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ Cart::total() }}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endif