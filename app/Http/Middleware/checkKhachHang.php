<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkKhachHang
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
        if (Session::has('ma_khach_hang')) {
            return $next($request);
        }
        return redirect()->route('dang_nhap')->withErrors(['whateverfieldname'=>'Bạn phải đăng nhập']);
    }
}
