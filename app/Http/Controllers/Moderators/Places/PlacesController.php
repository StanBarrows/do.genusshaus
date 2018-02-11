<?php

namespace Genusshaus\Http\Controllers\Moderators\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
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

    public function activate(Place $place)
    {
        if ($place->user_id) {
            $place->active = true;
            $place->type = 'premium';
            $place->save();
        }

        return back();
    }

    public function deactivate(Place $place)
    {
        $place->active = false;
        $place->published = false;
        $place->save();

        return back();
    }

    public function assign(AssignUserRequest $request, Place $place)
    {
        $user = User::where('email', $request->email)->first();

        $place->user_id = $user->id;
        $place->active = true;
        $place->save();

        return back();
    }

    public function unassign(Place $place)
    {
        $place->user_id = null;
        $place->active = false;
        $place->published = false;

        $place->save();

        return back();
    }

    public function publish(Place $place)
    {
        if ($place->active) {
            $place->published = true;
            $place->is_sent_for_review = false;
            $place->save();
        }

        return back();
    }

    public function unpublish(Place $place)
    {
        $place->published = false;
        $place->is_sent_for_review = false;
        $place->save();

        return back();
    }

    public function reset(Place $place)
    {
        $place->is_sent_for_review = false;
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
