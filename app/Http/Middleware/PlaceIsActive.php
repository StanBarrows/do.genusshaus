<?php

namespace Genusshaus\Http\Middleware;

use Closure;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Support\Facades\Route;

class PlaceIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */


    public function __construct()
    {

    }


    public function handle($request, Closure $next)
    {
        $place = Place::where('uuid', Route::current()->parameters()['place'])->first();

        if ($place->active) {
            return $next($request);
        }

        return back();
    }
}
