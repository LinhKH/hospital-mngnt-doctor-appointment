<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->is_ban == 0){

                if(Auth::user()->role_as == 'doctor') {
                    return $next($request);
                } else {
                    return redirect('/')->with('status','Access Denied');
                }

            }else{

                Auth::logout();
                return redirect('/login')->with('status','Your account has been banned');
            }
        }
        else
        {
            return redirect('/')->with('status','Please Login First');
        }
    }
}
