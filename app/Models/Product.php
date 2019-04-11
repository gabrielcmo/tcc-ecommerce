<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['image', 'name', 'description', 'value', 'qtd_in_stock', 'id_category'];
}
