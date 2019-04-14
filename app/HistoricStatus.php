<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class HistoricStatus extends Model
{
    public function historic(){
        return $this->belongsTo('Doomus\Historic');
    }
}
