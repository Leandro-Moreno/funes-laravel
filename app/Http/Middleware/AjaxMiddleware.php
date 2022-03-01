<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class AjaxMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->expectsJson()) {
        // this is an ajax request
        return $next($request);
        }
        return abort(404);

    // here you can handle non-ajax requests
    }
}
