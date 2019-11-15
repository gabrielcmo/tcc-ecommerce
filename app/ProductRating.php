<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Doomus\Product;

class ProductRating extends Pivot
{
    protected $table = 'products_ratings';

    public function product(){
        return $this->belongsTo('Doomus\Product');
    }
}
