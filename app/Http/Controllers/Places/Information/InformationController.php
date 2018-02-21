<?php

namespace Genusshaus\Http\Controllers\Places\Information;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Information\UpdateInformationRequest;

class InformationController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $place = current_place();

        return view('app.places.information.index', compact('place'));
    }

    public function update(UpdateInformationRequest $request)
    {
        $place = current_place();

        $place->description = $request->description;
        $place->save();

        return back();
    }
}
