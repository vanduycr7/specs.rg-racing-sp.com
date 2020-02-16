<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class LoginHistory extends Model
{
   use Filterable;

   protected $table = 'login_history';

    protected $fillable = [
        'user_id', 'user_email', 'ip_address',
    ];
}
