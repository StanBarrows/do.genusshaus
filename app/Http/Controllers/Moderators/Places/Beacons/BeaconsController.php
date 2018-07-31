<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Beacons;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Moderators\Places\Beacons\StoreBeaconsRequest;

class BeaconsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        $beacons = $place->beacons;

        return view('app.moderators.places.beacons.index', compact('place', 'beacons'));
    }

    public function create(Place $place)
    {
        $places = Place::all();

        return view('app.moderators.places.beacons.create', compact('place', 'places'));
    }

    public function store(StoreBeaconsRequest $request, Place $place)
    {
        $place->beacons()->create([
            'estimote_id' => $request->estimote_id,
            'major'       => $request->major,
            'minor'       => $request->minor,
            'title'       => $request->title,
            'body'        => $request->body
        ]);

        return redirect()->route('moderators.places.beacons.index', $place);
    }

    public function delete(Place $place, Beacon $beacon)
    {
        $beacon->delete();

        return back();
    }
}
