<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function order(){
        return $this->belongsTo('Doomus\Order');
    }
}