<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The Relationship
     *
     */
    public function role(){
        return $this->belongsTo('Doomus\Role');
    }

    public function order(){
         return $this->hasMany('Doomus\Order');
    }

    public function ratings() {
        return $this->hasMany('Doomus\ProductRating');
    }

    public function evaluations(){
        return $this->hasMany('Doomus\EvaluationText');
    }

    public function tickets() {
        return $this->hasMany('Doomus\Ticket');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cart_id', 'role_id', 'image', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
