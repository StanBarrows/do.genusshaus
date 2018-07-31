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

    public function index()
    {
        $place = current_place();

        return view('app.places.locations.index', compact('place'));
    }

    public function update(StoreContactsRequest $request)
    {
        return back();
    }
}
