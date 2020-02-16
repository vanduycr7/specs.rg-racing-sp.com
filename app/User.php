<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jrean\UserVerification\Traits\UserVerification;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserVerification, Filterable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'address', 'zipcode', 'city', 'country', 'email', 'password', 'credits', 'confirmation_code', 'confirmed', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
