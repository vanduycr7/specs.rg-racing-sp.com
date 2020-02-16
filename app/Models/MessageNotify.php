<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageNotify extends Model
{
    protected $table = 'message_notify';
    protected $fillable = [
        'user_id', 'message', 'url', 'is_read', 'item_id',
    ];
}
