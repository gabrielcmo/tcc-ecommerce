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

    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function status(){
        return $this->belongsTo('Doomus\OrderStatus');
    }

    public function ratings(){
        return $this->belongsToMany('Doomus\ProductRating', 'products_ratings', 'product_id', 'user_id', 'order_id');
    }

    public function payment_method(){
        return $this->belongsTo('Doomus\PaymentMethod');
    }
}
