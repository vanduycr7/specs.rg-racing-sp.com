<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Notifications;
use App\Models\Tickets;
use App\Models\Price;
use App\Models\Items;
use App\Models\Notify;
use App\Models\MessageNotify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use \Torann\GeoIP\GeoIP;
function get_ip_location($ip)
{
    $loc = geoip()->getLocation($ip);
    if ($loc)
    {
        return '<span class="flag-icon flag-icon-' . strtolower($loc->iso_code) . '"></span> ' . $loc->country . ', ' . $loc->city;
    }
}
function fetch_id($id)
{
    $output = Items::where('id', '=', $id)->first();
    if ($output)
    {
        return $output->item_id;
    } else {
        return null;
    }
}
function dr_avoid_robot()
{
    return \Request::is('password/*') ? '<meta name="robots" content="noindex">' :  '';
}
function check_brand_icon($id)
{
    $filename = 'images/brands/' . dr_name_lt('items', $id) . '.jpg';
    if (file_exists($filename))
    {
        return dr_name_lt('items', $id);
    } else {
        return 'Unknown';
    }
}
function dr_select($table)
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
function nav_msg_notifications_count()
{
    $data = 0;
    $data = MessageNotify::where('user_id', '=', Auth::id())->where('is_read', '=', 0)->count();
    return $data;
}
function push_msg_notification($user_id, $message, $url, $item_id)
{
    MessageNotify::create([
        'user_id' => $user_id,
        'message' => $message,
        'url' => $url,
        'item_id' => $item_id,
    ]);
}
function read_msg_notification($item_id)
{
    $notify = MessageNotify::where('user_id', '=', Auth::id())->where('is_read', '=', 0)->where('item_id', '=', $item_id)->first();
    if ($notify)
    {
            $notify->update(['is_read' => 1]);
    }
}
function nav_msg_notifications()
{
    $output = '';
    $data = MessageNotify::where('user_id', '=', Auth::id())->orderBy('created_at', 'DESC')->where('is_read', '=', 0)->get();
    if ($data) {
        foreach ($data as $item) {
            $output .= '<a class="list-group-item" href="' . $item->url . '" role="menuitem"><div class="media"><div class="media-left padding-right-10"><span class="avatar avatar-sm avatar-online"><img src="' . asset("images/Administrator.jpg") . '" alt="..."><i></i></span></div><div class="media-body"><h6 class="media-heading">Administrator</h6><div class="media-meta"><time datetime="' . $item->created_at . '">' . $item->created_at->diffForHumans(Carbon::now()) . '</time></div><div class="media-detail">' . $item->message . '</div></div></div></a>';
        }
    }
    return $output;
}
function nav_notifications_count()
{
    $data = 0;
    $data = Notify::where('user_id', '=', Auth::id())->where('is_read', '=', 0)->count();
    return $data;
}
function push_notification($user_id, $message, $icon, $bg_color, $url, $item_id)
{
    Notify::create([
        'user_id' => $user_id,
        'message' => $message,
        'icon' => $icon,
        'bg_color' => $bg_color,
        'url' => $url,
        'item_id' => $item_id,
    ]);
}
function read_notification($item_id)
{
    $notify = Notify::where('user_id', '=', Auth::id())->where('is_read', '=', 0)->where('item_id', '=', $item_id)->first();
    if ($notify)
    {
            $notify->update(['is_read' => 1]);
    }
}
function nav_notifications()
{
    $output = '';
    $data = Notify::where('user_id', '=', Auth::id())->orderBy('created_at', 'DESC')->where('is_read', '=', 0)->get();
    if ($data) {
        foreach ($data as $item) {
            $output .= '<a class="list-group-item" href="' . $item->url . '" role="menuitem"><div class="media"><div class="media-left padding-right-10"><i class="icon ' . $item->icon . ' ' . $item->bg_color . ' white icon-circle" aria-hidden="true"></i></div><div class="media-body"><h6 class="media-heading">' . trans('messages.' . $item->message) . '</h6><time class="media-meta" datetime="' . $item->created_at . '">' . $item->created_at->diffForHumans(Carbon::now()) . '</time></div></div></a>';
        }
    }
    return $output;
}
function dr_work_load()
{
    $count = \DB::table('files')->where('status', '=', 'Pending')->count();
    $count = number_format(($count / 10) * 100, 0);
    return $count;
}
function dr_link_active($path)
{
    return \Request::is($path . '*') ? ' active open' :  '';
}
function PushNotification($table, $option)
{
        $notification = DB::table($table)->orderBy('id', 'DESC')->pluck('id')->first();
        $push = Notifications::firstOrNew(array('user_id' => \Auth::user()->id, 'option_name' => $option));
        $push->user_id = \Auth::user()->id;
        $push->last_item = $notification;
        $push->option_name = $option;
        $push->save();
}
function PushDashNotification($event)
{
        DB::table('dashboard_notifications')->insert(['user_id' => \Auth::user()->id, 'event' => $event, 'created_at' => Carbon::now()]);
}
function GetNotificationCount($option, $table)
{
    $lastItem = \DB::table('notifications')->where('user_id', '=', \Auth::user()->id)->where('option_name', '=', $option)->value('last_item');

    if ($lastItem !== null)
    {
      return \DB::table($table)->where('id', '>', $lastItem)->count();
    } else {
      return \DB::table($table)->count();
    }
}
function ReadTicket($hash)
{

        if (Auth::user()->role === 1)
        {
            $push = Tickets::where('hash', '=', $hash)->first();
            $push->admin_unread = 0;
            $push->save();
        } else {
            $push = Tickets::where('hash', '=', $hash)->first();
            $push->unread = 0;
            $push->save();
        }


}
function NewTicketMessage($hash)
{
        $push = Tickets::where('hash', '=', $hash)->first();

        if (Auth::user()->role === 1)
        {
            $push->unread = $push->unread + 1;
        } else {
            $push->admin_unread = $push->admin_unread + 1;
        }

        $push->save();
}
function GetUnreadMessages($hash)
{
    if (Auth::user()->role === 1)
    {
        $target = 'admin_unread';
    } else {
        $target = 'unread';
    }

    if (Tickets::where('hash', '=', $hash)->pluck($target)->first())
    {
        $data = Tickets::where('hash', '=', $hash)->pluck($target)->first();
        return $data;
    } else {
        return 0;
    }
}
function GetUnreadMessagesCount()
{
    if (Auth::guest())
    {
        return 0;
    }

    if (Auth::user()->role === 1)
    {
        $count = 0;
        $data = Tickets::get();
        foreach ($data as $item)
        {
            $count = $count + $item->admin_unread;
        }
        return $count;
    } else {
        $count = 0;
        $data = Tickets::where('user_id', '=', Auth::id())->get();
        foreach ($data as $item)
        {
            $count = $count + $item->unread;
        }
        return $count;
    }

}
function GetYearList()
{
    $list = ['2017' => '2017', '2016' => '2016', '2015' => '2015', '2014' => '2014', '2013' => '2013', '2012' => '2012', '2011' => '2011', '2010' => '2010', '2009' => '2009', '2008' => '2008', '2007' => '2007', '2006' => '2006', '2005' => '2005', '2004' => '2004', '2003' => '2003', '2002' => '2002', '2001' => '2001', '2000' => '2000', '1999' => '1999', '1998' => '1998', '1997' => '1997', '1996' => '1996', '1995' => '1995', '1994' => '1994', '1993' => '1993', '1992' => '1992', '1991' => '1991', '1990' => '1990'];
      return $list;
}

function GetCountWhere($table, $int1, $int2)
{
    if (\Schema::hasTable($table)) {
      return \DB::table($table)->where($int1, '=', $int2)->count();
    } else {
      return "";
    }
}
function dr_list_select($table)
{
    if (\Schema::hasTable($table))
    {
      $list = \DB::table($table)
        ->pluck('name', 'slug');
      return $list;
    } else {
      return 'N/A';
    }
}
function dr_name_lt($table, $id)
{
    $value = 'name';

    if (App::getLocale() === 'us')
    {
        $value = 'name_en';
    }

    $output = \DB::table($table)
        ->where('id', '=', $id)
        ->orderBy('id', 'ASC')
        ->value($value);


    if (!empty($output)) {
      return $output;
    } else {
      return $id;
    }
}

function dr_name_en($table, $id)
{
    $value = 'name';

    if (App::getLocale() === 'us')
    {
        $value = 'name_en';
    }

    $output = \DB::table($table)
        ->where('id', '=', $id)
        ->orderBy('id', 'ASC')
        ->value($value);

    if (!empty($output)) {
      return $output;
    } else {
      return "";
    }
}

function dr_parent_name($id)
{
    $output = \DB::table('items')
        ->where('id', '=', $id)
        ->orderBy('id', 'ASC')
        ->value('parent');

    if (!empty($output)) {
      return dr_name_lt('items', $output);
    } else {
      return null;
    }
}
function dr_country_name($code)
{
    $name = \DB::table('country_list')->where('country_code', '=', $code)->value('country_name');
    return $name;
}

function get_chained($id, $order, $order_type)
{
    $value = 'name';

    if (App::getLocale() === 'us')
    {
        $value = 'name_en';
    }

    $list = \DB::table('items')->where('list', '=', $id)->orderBy($order, $order_type)->pluck($value, 'id');
    return $list;
}
function dr_price($id)
{
    $price = Price::where('item_id', '=', $id)->value('price');
    if ($price)
    {
        return $price;
    }
    return null;
}
function fileMessageMail($user_mail, $name, $message_text, $subject, $url, $button)
{
    $data = array('user_mail' => $user_mail, 'url' => $url, 'name' => $name, 'message_text' => $message_text, 'subject' => $subject, 'button' => $button);
    Mail::send( 'layouts.filemessage', $data, function( $message ) use ($data)
    {
        $message->to( $data['user_mail'] )->from( 'info@rg-racing-sp.com', trans('messages.remapas-file-service') )->subject( $data['subject'] );
    });
}
function ticketMessageMail($user_mail, $ticket_id, $name, $message_text, $subject)
{
    $data = array('user_mail' => $user_mail, 'ticket_id' => $ticket_id, 'name' => $name, 'message_text' => $message_text, 'subject' => $subject);
    Mail::send( 'layouts.ticketmessage', $data, function( $message ) use ($data)
    {
        $message->to( $data['user_mail'] )->from( 'info@rg-racing-sp.com', trans('messages.remapas-file-service') )->subject( $data['subject'] );
    });
}
function contactFormEmail($location, $type, $make, $model, $engine, $name, $email, $text, $subject)
{
    $data = array(
        'location' => $location,
        'type' => $type,
        'make' => $make,
        'model' => $model,
        'engine' => $engine,
        'name' => $name,
        'email' => $email,
        'text' => $text,
        'subject' => $subject,
        );
    Mail::send( 'layouts.contact-form', $data, function( $message ) use ($data)
    {
        $message->to( 'info@rg-racing-sp.com' )->from( 'info@rg-racing-sp.com', 'info@rg-racing-sp.com' )->subject( $data['subject'] );
    });
}
