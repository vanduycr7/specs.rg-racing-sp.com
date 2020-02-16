<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
   protected $table = 'notify';

    protected $fillable = [
        'user_id', 'message', 'icon', 'bg_color', 'url', 'is_read', 'item_id',
    ];
}
