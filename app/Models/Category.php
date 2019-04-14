<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
