<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = ['name', 'name_en', 'parent', 'position', 'list'];
}
