<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $ROLE_ADMIN = 0;
    public static $ROLE_CLIENT = 1;

    public function user(){
        return $this->belongsTo('Doomus\User');
    }
}
