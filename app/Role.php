<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Possible values
     *
     */
    public static $ROLE_ADMIN = 0;
    public static $ROLE_CLIENT = 1;

    /**
     * The Relationship
     *
     */
    public function user(){
        $this->hasOne('Doomus\User');
    }
}
