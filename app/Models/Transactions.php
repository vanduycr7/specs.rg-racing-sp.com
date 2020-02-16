<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Transactions extends Model
{
   use Filterable;

   protected $table = 'transactions';

    protected $fillable = [
        'user_id', 'ip_address', 'payment_id', 'token', 'status', 'amount', 'credits',
    ];
}
