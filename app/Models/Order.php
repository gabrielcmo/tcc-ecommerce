<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_status', 'id_payment_method', 'qtd_total',
         'value_total', 'id_cart_product', 'id_user'];

    public function status(){
        return $this->hasOne('App\Doomus\Order_Status');
    }

    public function payment_method(){
        return $this->hasOne('App\Doomus\Payment_Method');
    }

    public function cart_product(){
        return $this->hasMany('App\Doomus\Cart_Product');
    }

    public function user(){
        return $this->hasOne('App\Doomus\User');
    }
}
