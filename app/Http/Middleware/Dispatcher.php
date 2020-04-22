<?php

namespace App\Http\Middleware;

use Closure;

class Dispatcher
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
      if ($request->user()->setting->privilages !== 'dispatcher') {

        return redirect('/');
    }
        return $next($request);
    }
}
