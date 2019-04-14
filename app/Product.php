<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
        return $this->hasMany('Doomus\ProductImage');
    }
    
    public function payment_method(){
        return $this->hasOne('Doomus\PaymentMethod');
    }

    public function cart(){
        return $this->belongsTo('Doomus\Product');
    }

    public function category(){
        return $this->hasOne('Doomus\Category');
    }
}
