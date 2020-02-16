<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
   protected $table = 'ticket_messages';

    protected $fillable = [
        'hash', 'message', 'author',
    ];
}
