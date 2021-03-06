<?php

namespace App\Http\Middleware;

use Closure;

class VerifyNumber
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
        if (empty($request->user()->tel_verified_at)) {
            return redirect('/verification');
           }
        return $next($request);
    }
}
