<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = ['id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
