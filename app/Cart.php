<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->hasOne('Doomus\User');
    }

    public function products(){
        return $this->belongsToMany('Doomus\Product', 'cart_products');
    }

    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
