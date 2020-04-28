<?php

namespace App\Http\Middleware;

use Closure;

class Localize
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
        if($user = auth()->user()) {
            app()->setLocale($user->locale());
        } elseif(session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
