<?php

namespace App\Http\Middleware;

use Session;
use Auth;
use Closure;

class Admin
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
        // Check if the authenticated user has permission to access a particular route
        // If no permission it goes back 

        // Not an Administrator
        if(!Auth::user()->admin) {
            Session::flash('info', 'You dont have the required permission to peform this action!.');

            return redirect()->back();
        }

        return $next($request);
    }
}
