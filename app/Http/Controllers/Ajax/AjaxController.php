<?php
namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Price;
use App\Models\Notify;
use Auth;
use DB;
use Storage;
define('DIRECTORY', 'testing');
class AjaxController extends Controller
{
    public function fetchData(Request $request)
    {
        $value = 'name';

        if (\App::getLocale() === 'us')
        {
            $value = 'name_en';
        }
    	return Items::where('list', '=', $request['list'])->where('parent', '=', $request['id'])->orderBy('position', 'ASC')->select($value, 'id', 'item_id')->get();
    }
    public function fetchMeta(Request $request)
    {
        return DB::table('vehicle_meta')->where('list', '=', $request['list'])->where('model', '=', $request['model'])->where('item_id', '=', $request['id'])->get();
    }
    public function fetchStagePrice(Request $request)
    {
    	$id = $request->all();
	    $price = Price::where('item_id', '=', $id)->value('price');
	    if ($price)
	    {
	        return $price;
	    }
	    return '0';
    }
    public function readNotifications()
    {
        if (Auth::id())
        {
            $notify = Notify::where('user_id', '=', Auth::id())->get();
            foreach ($notify as $notification)
            {
                $notification->update(['is_read' => 1]);
            } 
        }
    }
}

