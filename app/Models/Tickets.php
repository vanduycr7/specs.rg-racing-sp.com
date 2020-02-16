<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
   protected $table = 'tickets';

    protected $fillable = [
        'user_id', 'name', 'email', 'ip_address', 'subject', 'message', 'hash', 'status',
    ];
}
