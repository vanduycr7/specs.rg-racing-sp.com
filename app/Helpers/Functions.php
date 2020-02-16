<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

namespace App\Helpers;

class Functions
{
  public function dr_select($table)
  {
    if (\Schema::hasTable($table))
    {
      $list = \DB::table($table)
        ->pluck('country_name', 'country_code');
      return $list;      
    } else {
      return 'N/A';
    }
  }

  public function dr_country_name($code)
  {
    $name = \DB::table('country_list')->where('country_code', '=', $code)->value('country_name');
    return $name;
  }
  public function dr_link_active($path)
  {
      return \Request::is($path . '*') ? ' active' :  '';
  }
}
