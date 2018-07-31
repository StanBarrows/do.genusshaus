<?php

namespace Genusshaus\Http\Controllers\Moderators\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
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
        $response = app('geocoder')->geocode($request->location)->get();

        if (!$response->count()) {
            return back();
        }

        $location = $response->first()->toArray();

        Place::create([

            'region_id' => $request->region_id,

            'type' => 'basic',

            'name' => $request->name,

            'location_street'     => $location['streetName'].' '.$location['streetNumber'],
            'location_postcode'   => $location['postalCode'],
            'location_city'       => $location['locality'],
            'location_latitude'   => $location['latitude'],
            'location_longitude'  => $location['longitude'],

            'image'      => false,
            'active'     => false,
            'published'  => false,
        ]);

        return redirect()->route('moderators.places.index');
    }

    public function edit(Place $place)
    {
        return view('app.moderators.places.edit', compact('place'));
    }
}
