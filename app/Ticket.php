<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    public function user () {
        return $this->belongsTo('Doomus\User');
    }
    public function ticket_type () {
        return $this->belongsTo('Doomus\TicketType');
    }
}
