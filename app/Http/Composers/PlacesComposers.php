<?php

namespace Genusshaus\Http\Composers;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Support\Facades\Route;

class PlacesComposers
{
    public function compose($view)
    {
        $view->with([
           'place' => Place::where('uuid', Route::current()->parameters()['place'])->first(),
        ]);
    }
}
