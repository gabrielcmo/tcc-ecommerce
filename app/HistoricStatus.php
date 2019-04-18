<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class HistoricStatus extends Model
{
    public static $STATUS_DENY = 0;
    public static $STATUS_ACCEPTED = 1;
    public static $STATUS_CANCELLED = 2;

    public function historic(){
        return $this->hasOne('Doomus\Historic');
    }
}
