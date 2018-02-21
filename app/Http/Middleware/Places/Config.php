<?php

namespace Genusshaus\Http\Middleware\Places;

use Closure;
use Genusshaus\App\Manager\Places\Manager;
use Genusshaus\Domain\Places\Models\Place;

class Config
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
        $place = $request->place();

        config()->set('app.name', $place->name);

        return $next($request);
    }

}
