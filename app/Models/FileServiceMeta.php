<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileServiceMeta extends Model
{
   protected $table = 'file_meta';

    protected $fillable = [
        'hash',
        'user_id',
        'year',
        'type',
        'make',
        'model',
        'engine',
        'gearbox',
        'fuel_type',
        'stage_type',
        'engine_torque',
        'engine_power',
        'engine_power_type',
        'ecu_manufacturer',
        'ecu_model',
        'ecu_hardware',
        'ecu_software',
        'options',
        'additional_info',
        'additional_email',
        'additional_phone',
        'interface_type',
        'interface_type_selection',
        'interface_type_input',
    ];
}
