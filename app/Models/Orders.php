<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
   protected $table = 'orders';

    protected $fillable = [
        'user_id', 'ip_address', 'payment_id', 'token', 'status', 'amount', 'credits',
    ];
}
