<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = ['id', 'cart_id', 'product_id'];
}
