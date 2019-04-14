<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $table = 'historics';

    protected $fillable = ['id_product', 'status'];

    /*
    * Valor 0 = Cancelado
    * Valor 1 = Aprovado
    * Valor 2 = Recusado
    */
    public static $STATUS_HISTORIC = [0, 1, 2];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
