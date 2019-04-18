<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public function order(){
        return $this->belongsTo('Doomus\Order');
    }
}