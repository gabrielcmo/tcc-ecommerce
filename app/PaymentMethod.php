<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public static $PAYPAL = 1;

    /**
     * The Relationship
     *
     */
    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
