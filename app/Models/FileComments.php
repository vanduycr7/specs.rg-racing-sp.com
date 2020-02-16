<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileComments extends Model
{
    protected $table = 'file_comments';
    protected $fillable = ['file_id', 'message', 'author'];
}
