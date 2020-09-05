<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;

class Localization
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
        $header = $request->header('Locale');

        if ($header) {
            App::setLocale($header);
        }

        return $next($request);
    }
}
