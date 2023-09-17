<?php

namespace App\Http\Middleware;

use Closure;

class AjaxMiddleware
{
     public function handle($request, Closure $next)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        return $next($request);
    }
}
