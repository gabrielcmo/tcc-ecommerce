<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;
use Doomus\Product;

class Order extends Model
{
    /**
     * The Relationship
     *
     */
    public function product(){
        return $this->belongsToMany('Doomus\Product')->withPivot('qty');
    }

    public function historic(){
        return $this->hasMany('Doomus\Historic');
    }

    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function status(){
        return $this->belongsTo('Doomus\OrderStatus');
    }

    public function payment_method(){
        return $this->belongsTo('Doomus\PaymentMethod');
    }
}
