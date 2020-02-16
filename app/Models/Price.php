<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
   protected $table = 'price';

    protected $fillable = [
        'item_id', 'price', 'discount',
    ];
}
