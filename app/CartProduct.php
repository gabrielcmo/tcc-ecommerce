<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    public function cart(){
        return $this->belongsTo('Doomus\Cart');
    }

    public function product(){
        return $this->hasMany('Doomus\Product');
    }
}
