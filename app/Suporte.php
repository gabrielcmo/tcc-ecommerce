<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    protected $table = 'support';

    public function user () {
        return $this->belongsTo('Doomus\User');
    }
}
