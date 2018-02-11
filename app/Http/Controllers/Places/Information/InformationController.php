<?php

namespace Genusshaus\Http\Controllers\Places\Information;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Information\UpdateInformationRequest;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        return view('app.places.information.index', compact('place'));
    }

    public function update(UpdateInformationRequest $request, Place $place)
    {
        $place->description = $request->description;
        $place->save();

        return back();
    }
}
