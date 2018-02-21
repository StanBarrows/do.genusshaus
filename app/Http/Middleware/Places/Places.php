<?php

namespace Genusshaus\Http\Middleware\Places;

use Closure;
use Genusshaus\App\Manager\Places\Manager;
use Genusshaus\Domain\Places\Models\Place;

class Places
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
        $place = $this->resolvePlace(

            $request->place ?: session()->get('place')
        );

        if (!auth()->user()->places->contains('id', $place->id)) {
            return redirect('users.dashboard.index');
        }

        $this->registerPlace($place);

        return $next($request);
    }
    protected function registerPlace($place)
    {
        app(Manager::class)->setPlace($place);

        session()->put('place', $place->id);

    }

    protected function resolvePlace($place)
    {
        return Place::find($place);
    }
}
