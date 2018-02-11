<?php

namespace Genusshaus\Http\Controllers\Moderators\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Moderators\Places\AssignUserRequest;
use Genusshaus\Http\Requests\Moderators\Places\StorePlacesRequest;

class PlacesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
        $this->middleware('role:administrator')->only('delete');
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->get();

        return view('app.moderators.places.index', compact('places'));
    }

    public function create()
    {
        $regions = Region::where('active', true)->get();

        return view('app.moderators.places.create', compact('regions'));
    }

    public function store(StorePlacesRequest $request)
    {
        $place = new Place();

        $place->region_id = $request->region_id;
        $place->name = $request->name;
        $place->active = false;
        $place->published = false;

        $place->save();

        return redirect()->route('moderators.places.index');
    }

    public function edit(Place $place)
    {
        return view('app.moderators.places.edit', compact('place'));
    }





    public function unassign(Place $place)
    {
        $place->user_id = null;
        $place->active = false;
        $place->published = false;

        $place->save();

        return back();
    }


    public function delete(Place $place)
    {
        $place->active = false;
        $place->published = false;
        $place->save();

        $place->delete();

        return redirect()->route('moderators.places.index');
    }
}
