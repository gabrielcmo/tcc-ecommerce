<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $fillable = ['id', 'user_id', 'product_id', 'status_id'];

    public function user(){
        return $this->hasMany('Doomus\User');
    }

    public function status(){
        return $this->hasOne('Doomus\HistoricStatus');
    }
}
