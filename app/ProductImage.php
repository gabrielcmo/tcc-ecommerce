<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * The Relationship
     *
     */
    public function product(){
        return $this->belongsTo('Doomus\Product');
    }
}
