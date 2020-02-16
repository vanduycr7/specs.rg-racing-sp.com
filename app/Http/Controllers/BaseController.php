<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use DB;
use Carbon;

class BaseController extends Controller
{
    public function chiptuningView(Request $request)
    {
    	$make = $request['make'];
    	$model = $request['model'];
    	$engine = $request['engine'];
    	$type = null;
    	if ($make && $model && $engine)
    	{
    		$type = 747;
    	} elseif ($request['type'])
        {
            $type = $request['type'];
        }
		
		return view('homepage.chiptuning', compact('type', 'make', 'model', 'engine'));
    }
    public function contactForm(Request $request)
    {
        $input = $request->all ();
        $validator = Validator::make($input, [
            
            'form_type' => 'required',
            'form_make' => 'required|string|max:200',
            'form_model' => 'required|string|max:200',
            'form_engine' => 'required|string|max:200',
            'form_name' => 'required|string|max:200',
            'form_email' => 'required|email|string|max:200',
            'form_text' => 'required|string|max:450',
        ]);

        $time = DB::table('mail')->where('ip_address', '=', \Request::ip())->orderBy('time', 'DESC')->value('time');
        if ($time)
        {
            $time = Carbon\Carbon::parse($time);
            $time = $time->addMinutes(2);
            if (Carbon\Carbon::now() < $time) {
                if (Carbon\Carbon::now()->diffInMinutes($time) > 0) {
                        if (Carbon\Carbon::now()->diffInMinutes($time) > 1)
                            {
                                $endtime = Carbon\Carbon::now()->diffInMinutes($time) . ' ' . trans('messages.minutes');
                            } else {
                                $endtime = Carbon\Carbon::now()->diffInMinutes($time) . ' ' . trans('messages.minute');
                            }

                } else {
                    $endtime = Carbon\Carbon::now()->diffInSeconds($time) . ' ' . trans('messages.seconds');
                }
               return response()->json(['error' => trans('messages.anti-flood') . ' ' . $endtime], 404);
            }
        }

        if ($validator->passes())
        {
            if ($request['form_type'] === '747')
            {
                $type = 'Car';
            } elseif ($request['form_type'] === '748')
            {
                $type = 'Truck';
            } elseif ($request['form_type'] === '749')
            {
                $type = 'Tractors';
            } else {
                $type = '???';
            }
            contactFormEmail($input['location'], $type, $input['form_make'], $input['form_model'], $input['form_engine'], $input['form_name'], $input['form_email'], $input['form_text'], 'Request received: ' . $input['form_make'] . ' ' . $input['form_model'] . ' ' . $input['form_engine']);
            DB::table('mail')->insert(['ip_address' => \Request::ip(), 'time' => Carbon\Carbon::now(), 'email' => $input['form_email']]);
            return response()->json(['success' => trans('messages.email-has-successfully-sent')]);
        } else {
            return response()->json(['error' => trans('messages.please-check-fields')], 404);
        }
    }

    public function partnershipForm(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            
            'vardas_pavarde' => 'required|string|max:200',
            'telefonas' => 'required|string|max:200',
            'el_pastas' => 'required|email|max:200',
            'adresas' => 'required|string|max:500',
            'siekimas' => 'required|string|max:2500',
            'patirtis' => 'required|string|string|max:2500',
            'resursai' => 'required|string|max:2500',
            'apmokymai' => 'required|string|max:2500',
        ]);
        $time = DB::table('mail')->where('ip_address', '=', \Request::ip())->orderBy('time', 'DESC')->value('time');
        if ($time)
        {
            $time = Carbon\Carbon::parse($time);
            $time = $time->addMinutes(2);
            if (Carbon\Carbon::now() < $time) {
                if (Carbon\Carbon::now()->diffInMinutes($time) > 0) {
                        if (Carbon\Carbon::now()->diffInMinutes($time) > 1)
                            {
                                $endtime = Carbon\Carbon::now()->diffInMinutes($time) . ' ' . trans('messages.minutes');
                            } else {
                                $endtime = Carbon\Carbon::now()->diffInMinutes($time) . ' ' . trans('messages.minute');
                            }

                } else {
                    $endtime = Carbon\Carbon::now()->diffInSeconds($time) . ' ' . trans('messages.seconds');
                }
               return response()->json(['error' => trans('messages.anti-flood') . ' ' . $endtime], 404);
            }
        }

        if ($validator->passes())
        {
            Mail::send( 'layouts.partnership-form', $input, function( $message ) use ($input)
            {
                $message->to( 'mantis@outlook.ie' )->from( 'system@remapas.lt', 'Remapas' )->subject( 'Partnerystės užklausa' );
            });

            DB::table('mail')->insert(['ip_address' => \Request::ip(), 'time' => Carbon\Carbon::now(), 'email' => $input['el_pastas']]);
            return response()->json(['success' => trans('messages.email-has-successfully-sent')]);
        } else {
            return response()->json(['error' => trans('messages.please-check-fields')], 404);
        }
    }
}
