<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public static $STATUS_PROCESSING = 1;
    public static $STATUS_OK = 2;
    public static $STATUS_TRANSPORT = 3;
    public static $STATUS_GUARDED = 4;

    /**
     * The Relationship
     *
     */
    public function order(){
        return $this->hasOne('Doomus\Order');
    }
}
