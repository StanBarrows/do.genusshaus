<?php

namespace Genusshaus\Http\Controllers\Moderators\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;

class PlacesController extends Controller
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
        $places = Place::all();

        return view('app.moderators.places.index', compact('places'));
    }

    public function create()
    {
        $region = Region::first();

        return view('app.moderators.places.create', compact('region'));
    }
}
