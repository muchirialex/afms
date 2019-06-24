<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckIsActive
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
        if (Auth::check())
        {
            if (Auth::User()->status != '1')
            {
                //alertify()->error('Password not changed!')->delay(3000)->position('bottom right');
                return redirect()->to('/');
            }
        }

        return $next($request);
    }
}
