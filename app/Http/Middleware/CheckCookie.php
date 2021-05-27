<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * НЕ ЗАБЫВАЕМ РЕГИСТРИРОВАТЬ ПОСРЕДНИКА В KERNEL.php
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset($_COOKIE['user'])){
            return $next($request);
        }
        else{
            //dd('go to the ass!!! fucking bitch');
            //return redirect()->route('/admin');
            return redirect('/');
        }
    }
}
