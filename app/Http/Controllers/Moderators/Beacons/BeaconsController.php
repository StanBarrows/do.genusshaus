<?php

namespace Genusshaus\Http\Controllers\Moderators\Beacons;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;

class BeaconsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:moderator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beacons = Beacon::all();

        return view('app.moderators.beacons.index', compact('beacons'));
    }


    public function create()
    {
        $places = Place::all();

        return view('app.moderators.beacons.create',compact('places'));
    }
}
