<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'order_id', 'status_id'];

    /**
     * The Relationship
     *
     */
    public function status(){
        return $this->belongsTo('Doomus\HistoricStatus');
    }

    public function order(){
        return $this->belongsTo('Doomus\Order');
    }
}