<?php

namespace App\Http\Middleware;

use Closure;

class FiltreIpMiddleware
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
        //dd($request->getClientIp());

        // Before request
        if($request->getClientIp() == "127.0.0.1"){
            return $next($request);
        }

        // After request
      //  $request = $next($request);


        //return abort(500);
        return response('Unauthenticated.', 401);
    }
}
