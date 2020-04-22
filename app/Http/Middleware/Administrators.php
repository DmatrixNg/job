<?php

namespace App\Http\Middleware;

use Closure;

class Administrators
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
      if ($request->user()->setting->type !== 'administrator') {
        return redirect('/');
    }
        return $next($request);
    }
}
