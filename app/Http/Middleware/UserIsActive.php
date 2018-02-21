<?php

namespace Genusshaus\Http\Middleware;

use Closure;

class UserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (!auth()->user()->active) {
            return back();
        }

        return $next($request);
    }
}
