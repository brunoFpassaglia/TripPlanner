<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfPublic
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
        if($request->trip->is_public != true){
            // redirect to invitation controller, else go to add participant controller.
        }
        return $next($request);
    }
}
