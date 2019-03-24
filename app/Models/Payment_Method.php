<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = ['type'];
    
    /*
    * Valor 0 = PayPal
    * Valor 1 = PagSeguro
    */
    public static $PAYMENT_METHOD = [0, 1];
}
