<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsTripOrganizer
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
        if($request->user()->id != $request->trip->creator_id){
            session()->flash('warnings', 'Only admins are allowed to edit trip details');
            return redirect()->back();
        }
        return $next($request);
    }
}
