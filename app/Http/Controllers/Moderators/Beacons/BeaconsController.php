<?php

namespace Genusshaus\Http\Controllers\Moderators\Beacons;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Moderators\Beacons\StoreBeaconsRequest;

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
    public function index()
    {
        $beacons = Beacon::with('place')->get();

        return view('app.moderators.beacons.index', compact('beacons'));
    }

    public function create()
    {
        $places = Place::all();

        return view('app.moderators.beacons.create', compact('places'));
    }

    public function store(StoreBeaconsRequest $request)
    {
        $beacon = new Beacon();

        $beacon->place_id = $request->place_id;
        $beacon->major = $request->major;
        $beacon->minor = $request->minor;

        $beacon->save();

        return redirect()->route('moderators.beacons.index');
    }
}
