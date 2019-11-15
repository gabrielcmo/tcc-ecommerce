<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $table = 'products_ratings';

    public function products() 
    {
        return $this->belongsToMany('Doomus\Product', 'products_ratings', 'product_id', 'user_id', 'order_id');
    }

    public function user() 
    {
        return $this->belongsTo('Doomus\User');
    }
}
