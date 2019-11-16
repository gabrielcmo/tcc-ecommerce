<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductRating extends Pivot
{
    protected $table = 'products_ratings';

    public function product() 
    {
        return $this->belongsTo('Doomus\Product');
    }

    public function user() 
    {
        return $this->belongsTo('Doomus\User');
    }
}
