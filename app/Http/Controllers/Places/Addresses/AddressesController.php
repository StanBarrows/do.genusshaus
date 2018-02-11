<?php

namespace Genusshaus\Http\Controllers\Places\Addresses;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Contacts\StoreContactsRequest;

class AddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        return view('app.places.addresses.index', compact('place'));
    }

    public function update(StoreContactsRequest $request, Place $place)
    {
        return back();
    }
}
