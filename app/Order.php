<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The Relationship
     *
     */
    public function products(){
        return $this->belongsTo('Doomus\Product');
    }

    public function status(){
        return $this->belongsTo('Doomus\OrderStatus');
    }

    public function cart(){
        return $this->belongsTo('Doomus\Cart');
    }

    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function payment_method(){
        return $this->belongsTo('Doomus\PaymentMethod');
    }
}
