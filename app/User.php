<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function cart(){
        return $this->hasOne('Doomus\Cart');
    }

    public function role(){
        return $this->hasOne('Doomus\Role');
    }

    public function historic(){
        return $this->hasOne('Doomus\Historic');
    }
}
