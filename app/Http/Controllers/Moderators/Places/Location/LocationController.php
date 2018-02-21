<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Location;

use Genusshaus\App\Controllers\Controller;
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

    public function update(UpdateLocationsRequest $request, Place $place)
    {
        $response = app('geocoder')->geocode($request->location)->get();

        if (!$response->count()) {
            return back();
        }
        $location = $response->first()->toArray();

        $place->update([
            'location_street'  => $location['streetName'].' '.$location['streetNumber'],
            'location_postcode'=> $location['postalCode'],
            'location_city'    => $location['locality'],
            'location_latitude'   => $location['latitude'],
            'location_longitude'  => $location['longitude'],
        ]);

        return back();
    }
}
