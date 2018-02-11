<?php

namespace Genusshaus\Http\Controllers\Places\Locations;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Contacts\StoreContactsRequest;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        $location = $place->location;

        return view('app.places.locations.index', compact('place','location'));
    }

    public function update(StoreContactsRequest $request, Place $place)
    {
        return back();
    }
}
