<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The Relationship
     *
     */
    public function products(){
        return $this->hasMany('Doomus\Product');
    }
}
