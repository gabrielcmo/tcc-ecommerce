<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_status', 'id_payment_method', 'qtd_total',
         'value_total', 'id_cart_product', 'id_user'];
}
