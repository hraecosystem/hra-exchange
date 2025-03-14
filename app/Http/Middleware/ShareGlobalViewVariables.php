<?php

namespace App\Http\Middleware;

use Closure;

class ShareGlobalViewVariables
{
    public function handle($request, Closure $next): mixed
    {
        return $next($request);
    }
}
