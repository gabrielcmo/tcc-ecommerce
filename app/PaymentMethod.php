<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    /**
     * The Relationship
     *
     */
    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
