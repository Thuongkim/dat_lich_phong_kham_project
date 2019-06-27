<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkBacSi
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
        if (Session::has('ma_bac_si')) {
            return $next($request);
        }
        return redirect()->route('view_login')->with('error','Bạn phải đăng nhập');
    }
}
