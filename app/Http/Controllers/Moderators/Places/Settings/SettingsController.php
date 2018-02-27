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

        if(empty($place->description))
        {
            return back();
        }

        if(empty($place->contact_name))
        {
            return back();
        }

        if(empty($place->contact_email))
        {
            return back();
        }

        if(empty($place->contact_phone))
        {
            return back();
        }

        if(empty($place->contact_web))
        {
            return back();
        }

        if (empty($place->active))
        {
            return back();
        }

        if (empty($place->openingHours()->count()))
        {
            return back();
        }



        if (empty($place->uploadcares()->count()))
        {
            return back();
        }


        $place->published = true;

        $place->save();


        return back();
    }

    public function type(Place $place)
    {
        if ($place->type === 'basic') {
            $place->type = 'premium';
            $place->save();
        } else {
            $place->type = 'basic';
            $place->save();
        }

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
