<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('tuoi') && $request['tuoi'] > 100 && $request['tuoi'] < 105) {
            return $next($request);
        } else {
            return redirect()->route('taothanhvien');
        }
    }
}
