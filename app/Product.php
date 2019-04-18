<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
        return $this->hasMany('Doomus\ProductImage');
    }

    public function cart(){
        return $this->belongsToMany('Doomus\Cart')->using('Doomus\CartProduct');
    }

    public function category(){
        return $this->hasOne('Doomus\Category');
    }
}
