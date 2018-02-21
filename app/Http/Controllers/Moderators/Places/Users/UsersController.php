<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Users;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Notifications\InviteUsersNotification;
use Genusshaus\Domain\Moderators\Notifications\JoinUsersNotification;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Moderators\Places\Users\StoreInvitationsRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
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
        $users = $place->users;

        return view('app.moderators.places.users.index', compact('place', 'users'));
    }

    public function invite(Place $place)
    {
        $users = User::inactive()->get();

        return view('app.moderators.places.users.invite', compact('place', 'users'));
    }

    public function create(Place $place)
    {
        $places = Place::where('user_id', '=', null)->get();

        return view('app.moderators.places.users.create', compact('place', 'places'));
    }

    public function store(StoreInvitationsRequest $request, Place $place)
    {
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make(Str::random(16));
            $user->active = false;
            $user->setRememberToken(Str::random(60));
            $user->save();

            $user->places()->attach($place);

            $user->notify(new InviteUsersNotification($user, $place));

        } else {
            $user->places()->detach($place);
            $user->places()->attach($place);

            $user->notify(new JoinUsersNotification($user, $place));
        }

        return back();
    }
}
