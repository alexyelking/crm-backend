<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function handle($request, Closure $next, $guard = null)
    {
        throw_if(Auth::guard($guard)->check(), new UnauthorizedException());

        return $next($request);
    }
}
