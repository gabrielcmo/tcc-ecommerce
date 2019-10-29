<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

    public static $STATUS_PROCESSING = 1;
    public static $STATUS_APPROVED = 2;
    public static $STATUS_TRANSPORT = 3;
    public static $STATUS_DELIVERED = 4;
    public static $STATUS_CANCELLED = 5;

    /**
     * The Relationship
     *
    */
    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
