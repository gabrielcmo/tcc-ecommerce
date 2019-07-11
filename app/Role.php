<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Possible values
     *
     */
    public static $ROLE_ADMIN = 1;
    public static $ROLE_CLIENT = 2;

    /**
     * The Relationship
     *
     */
    public function user(){
        $this->hasOne('Doomus\User');
    }
}
