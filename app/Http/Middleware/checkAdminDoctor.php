<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkAdminDoctor
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
        if (Session::has('ma_bac_si') || Session::has('ma_admin')) {
            return $next($request);
        }
        return redirect()->back();
    }
}
