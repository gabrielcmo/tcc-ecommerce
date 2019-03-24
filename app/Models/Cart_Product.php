<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    protected $table = 'cart_products';

    protected $fillable = ['qtd', 'id_product', 'id_cart'];
}
