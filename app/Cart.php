<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->hasOne('Doomus\User');
    }

    public function products(){
        return $this->hasMany('Doomus\Product')->using('Doomus\CartProduct');
    }

    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
