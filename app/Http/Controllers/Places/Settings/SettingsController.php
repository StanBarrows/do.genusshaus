<?php

namespace Genusshaus\Http\Controllers\Places\Settings;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Notifications\ReviewRequestNotification;
use Genusshaus\Domain\Users\Models\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $place = current_place();

        return view('app.places.settings.index', compact('place'));
    }

    public function unpublish()
    {
        $place = current_place();

        $place->published = false;
        $place->save();

        //Notify Moderators -> Ask Why?

        return back();
    }

    public function review()
    {
        $place = current_place();

        $place->reviewed = false;
        $place->save();

        $users = User::has('roles')->with('roles')->get();

        foreach($users as $user)
        {
            $user->notify(new ReviewRequestNotification($place));
        }

        return back();
    }
}
