<?php

namespace App\Http\Middleware;

use Closure;

class isCash
{
    public function handle($request, Closure $next)
    {

        return $next($request);
    }
}
