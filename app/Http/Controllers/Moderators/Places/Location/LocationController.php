<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Location;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Location;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Moderators\Places\Locations\UpdateLocationsRequest;

class LocationController extends Controller
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
        return view('app.moderators.places.location.index', compact('place'));
    }

    public function update(UpdateLocationsRequest $request, Place $place, Location $location)
    {
        $response = app('geocoder')->geocode($request->location)->get();

        if(!$response->count())
        {
            return back();
        }

        $location = $response->first()->toArray();

        $place->location()->update([

            'street' => $location['streetName'] . ' ' . $location['streetNumber'],
            'postcode' => $location['postalCode'],
            'city' => $location['locality'],
            'latitude' => $location['latitude'],
            'longitude' => $location['longitude'],
        ]);

        return back();
    }
}
