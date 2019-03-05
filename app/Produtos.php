<?php

namespace ecommerce;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'id', 'name', 'desc', 'value', 'id_categoria'
    ];
}
