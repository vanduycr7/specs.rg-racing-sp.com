<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileService extends Model
{
	protected $table = 'files';
	protected $fillable = ['hash', 'user_id', 'ecu_file', 'status', 'download_link', 'power_plus', 'torque_plus', 'price'];

	public function FileMeta()
	{
		return $this->belongsTo('App\Models\FileServiceMeta', 'hash', 'hash');
	}
}
