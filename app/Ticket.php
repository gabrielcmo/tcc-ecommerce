<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    public function user () {
        return $this->belongsTo('Doomus\User');
    }
}
