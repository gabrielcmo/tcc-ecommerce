<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class EvaluationText extends Model
{
    protected $table = 'evaluation_texts';

    /**
     * The Relationship
     *
     */
    public function user(){
        return $this->belongsTo('Doomus\User');
    }

    public function product(){
        return $this->belongsTo('Doomus\Product');
    }
}
