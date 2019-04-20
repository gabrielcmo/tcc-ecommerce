<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
        return $this->belongsTo('Doomus\ProductImage');
    }

    public function cart(){
        return $this->belongsToMany('Doomus\Cart', 'cart_products');
    }

    public function category(){
        return $this->belongsTo('Doomus\Category');
    }
}
