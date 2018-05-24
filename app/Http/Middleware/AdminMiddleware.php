<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->admin)
                return $next($request);
            else
                session()->flash('error', 'Bạn Không Phải Là Admin!');

        }
        session()->flash('error', 'Bạn Chưa Đăng Nhập!');
        return redirect()->route('admin.loginView');
    }
}
