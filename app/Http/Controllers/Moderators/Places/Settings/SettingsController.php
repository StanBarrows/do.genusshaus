<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Settings;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Administrators\Jobs\AddPlaceToRecommender;
use Genusshaus\Domain\Places\Models\Place;
use Recombee\RecommApi\Requests\AddItem;
use Recombee\RecommApi\Requests\SetItemValues;

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
            $place->is_sent_for_review = false;
            $place->save();
        }

        $collection = Place::where('uuid', $place->uuid)->get();

        AddPlaceToRecommender::dispatch($collection);

        return back();
    }

    public function unpublish(Place $place)
    {
        $place->published = false;
        $place->is_sent_for_review = false;
        $place->save();

        return back();
    }

    public function activate(Place $place)
    {
        $place->active = true;
        $place->type = 'premium';
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

    public function reset(Place $place)
    {
        $place->is_sent_for_review = false;
        $place->published = false;
        $place->save();

        return back();
    }
}
