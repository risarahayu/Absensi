<?php

namespace App\Http\Middleware;

use Closure;

class ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$status_user)
    {
        //validasi
        if (in_array($request->user()->status_user, $status_user)) {
            return $next($request);
        }
        return redirect('homepage');
    }
}
