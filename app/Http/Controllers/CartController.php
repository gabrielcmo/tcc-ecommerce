<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Doomus\Cart as CartModel;
use Illuminate\Support\Facades\Auth;
use Doomus\Http\Requests\AddToCart;
use Doomus\Http\Controllers\UserController as User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Doomus\Product;

class CartController extends Controller
{
    /*
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = User::getCart();
        return view('user.cart')->with('cart', $cart);
    }

    /**
     * Add to cart
     *
     * @param $product_id
     * @return \Illuminate\Http\Response
     */
    public function addToCart(AddToCart $request, $product_id = null)
    {
        $product = $product_id !== null ? Product::find($product_id) : Product::find($request->get('product_id'));

        if($request->get('qty') !== null && $request->get('qty') > $product->qtd_last){
            Session::flash('status', "Desculpe, nós só temos mais $product->qtd_last restante desse produto no estoque..
                Adicione até esse valor!");
            Session::flash('status-type', 'danger');
            return back();
        }

        if($product_id !== null){

            $name = $product->name;
            $qtd = 1;
            $price = $product->price;

            Cart::add($product_id, $name, $qtd, $price)->associate('Product');

            Session::flash('status', 'Produto adicionado ao carrinho!');

            return back();    
        }

        $qtd = $request->get('qty');

        $name = $product->name;
        $price = $product->price;

        Cart::add($request->get('product_id'), $name, $qtd, $price)->associate('Product');

        Session::flash('status', 'Produto adicionado ao carrinho!');
        return back();
    }
    
    /**
     * Remove from cart
     *
     * @param Product $product_id
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart(Product $product_id)
    {
        Cart::remove($product_id);

        Session::flash('status', 'Produto removido do carrinho');
        Session::flash('status-type', 'danger');
        return back();
    }

    /**
     * Change quantity
     *
     * @param Product $product_id
     * @param Product $qty
     * @return \Illuminate\Http\Response
     */
    public function changeQuantity(Product $product_id, $qty)
    {
        Cart::update($product_id, $qty);

        return back();
    }

    public function clearCart(){
        Cart::destroy();

        Session::flash('status', 'Carrinho limpo');
        return back();
    }
}
