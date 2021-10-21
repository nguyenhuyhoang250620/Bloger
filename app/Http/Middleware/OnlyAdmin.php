<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
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
        if(Auth::user()->id == 2 && Auth::user()->created_at == '2021-10-15 08:41:42'){
            return $next($request);
        }
        else{
            return redirect()->route('trangchu');
        }
    }
}
