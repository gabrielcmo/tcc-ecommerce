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
    protected $fillable = ['id', 'user_id', 'product_id', 'status_id'];

    /**
     * The Relationship
     *
     */
    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function status(){
        return $this->belongsTo('Doomus\HistoricStatus');
    }

    public function product(){
        return $this->belongsTo('Doomus\Product');
    }
}
