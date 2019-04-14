<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status(){
        return $this->hasOne('Doomus\OrderStatus');
    }

    public function cart(){
        return $this->hasOne('Doomus\CartProduct');
    }

    public function user(){
        return $this->hasOne('Doomus\User');
    }

    public function payment_method(){
        return $this->hasOne('Doomus\PaymentMethod');
    }
}
