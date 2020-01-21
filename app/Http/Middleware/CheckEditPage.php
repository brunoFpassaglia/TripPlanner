<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEditPage
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        // do not let another user edit some profile that is not his
        if(Auth::id() != $request->user->id){
            return(redirect()->route('profile', $request->user));
        }
        else{
            return $next($request);
        }
        
    }
}
