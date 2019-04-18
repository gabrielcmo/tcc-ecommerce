<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function products(){
        return $this->belongsToMany('Doomus\Product')->using('Doomus\CartProduct');
    }

    public function order(){
        return $this->belongsTo('Doomus\Order');
    }
}
