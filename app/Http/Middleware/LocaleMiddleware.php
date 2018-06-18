<?php

namespace App\Http\Middleware;

use Closure;
use App;

class LocaleMiddleware
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
        $language = session()->get('website_language', config('app.locale'));
        // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config
        config(['app.locale' => $language]);
        // Chuyển ứng dụng sang ngôn ngữ được chọn
        return $next($request);
    }
}
