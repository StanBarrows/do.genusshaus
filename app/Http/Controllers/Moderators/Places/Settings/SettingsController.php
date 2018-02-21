<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Settings;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class SettingsController extends Controller
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
        return view('app.moderators.places.settings.index', compact('place'));
    }

    public function publish(Place $place)
    {
        if ($place->active) {
            $place->published = true;
            $place->save();
        }

        /*   $collection = Place::where('uuid', $place->uuid)->get();

         AddPlaceToRecommender::dispatch($collection);*/

        return back();
    }

    public function unpublish(Place $place)
    {
        $place->published = false;
        $place->save();

        return back();
    }

    public function activate(Place $place)
    {
        $place->active = true;
        $place->save();

        return back();
    }

    public function deactivate(Place $place)
    {
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
