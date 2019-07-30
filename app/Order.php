<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The Relationship
     *
     */
    public function product(){
        return $this->belongsToMany('Doomus\Product');
    }

    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function payment_method(){
        return $this->belongsTo('Doomus\PaymentMethod');
    }
}
