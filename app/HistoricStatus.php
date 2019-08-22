<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class HistoricStatus extends Model
{
    public static $STATUS_OK = 1;
    public static $STATUS_DENY = 2;
    public static $STATUS_CANCELLED = 2;

    /**
     * The Relationship
     *
     */
    public function historic(){
        return $this->hasOne('Doomus\Historic');
    }
}
