<?php

namespace Genusshaus\Http\Controllers\Places\Settings;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        return view('app.places.settings.index', compact('place'));
    }

    public function unpublish(Place $place)
    {
        $place->published = false;
        $place->save();

        //Notify Moderators -> Ask Why?

        return back();
    }

    public function review(Place $place)
    {
        $place->is_sent_for_review = true;
        $place->save();

        //Notify Moderators

        return back();
    }
}
