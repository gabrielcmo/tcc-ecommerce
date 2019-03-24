<?php

namespace Doomus\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Status extends Model
{
    protected $table = 'order_statuses';

    protected $fillable = ['status'];

    /*
    * Valor 0 = Em andamento
    * Valor 1 = Aprovado
    * Valor 2 = Recusado
    */
    public static $STATUS_ORDER = [0, 1, 2];
}
