<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $roles)
    {
        if (!in_array($request->user()->role, explode(',', $roles)))
            return abort(403);

        return $next($request);
    }
}
