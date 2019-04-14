<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(){
        return $this->hasOne('Doomus\OrderStatus');
    }
}
