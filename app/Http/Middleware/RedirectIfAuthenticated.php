<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                //retorna  ala pagina de inicio si no ha visitado alguna pagian antes si np redirige a la pagina que visito
                $urlIntended = session('url.intended');
                return $urlIntended ? redirect($urlIntended) : redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
