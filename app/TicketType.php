<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = 'ticket_types';
    
    public function ticket_type() {
        return $this->hasOne('Doomus\Ticket');
    }
}
