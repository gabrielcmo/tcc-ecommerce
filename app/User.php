<?php

namespace Doomus;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    
    public function cart(){
        return $this->hasOne('Doomus\Cart');
    }

    public function role(){
        return $this->hasOne('Doomus\Role');
    }

    public function historic(){
        return $this->hasOne('Doomus\Historic');
    }

    public function order(){
        return $this->belongsTo('Doomus\Order');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
