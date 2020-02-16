<?php

namespace App\Http\Middleware;

use Closure;

class FileOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id)
    {
         if (Auth::user() &&  Auth::user()->id == $id) {
                return $next($request);
         }

        return redirect('/');
    }
}
