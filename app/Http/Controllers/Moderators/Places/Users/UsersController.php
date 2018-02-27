<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Users;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Notifications\InviteNewUsersNotification;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Genusshaus\Http\Requests\Moderators\Places\Users\StoreExistingUserInvitationRequest;
use Genusshaus\Http\Requests\Moderators\Places\Users\StoreNewUserInvitationsRequest;
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
        $users = User::all();

        $inactives = $place->users()->inactive()->get();

        return view('app.moderators.places.users.invite', compact('place', 'users', 'inactives'));
    }

    public function create(Place $place)
    {
        $places = Place::where('user_id', '=', null)->get();

        return view('app.moderators.places.users.create', compact('place', 'places'));
    }

    public function resend(Place $place, User $user)
    {
        $user->notify(new InviteNewUsersNotification($user, $place));

        return back();
    }

    public function remove(Place $place, User $user)
    {
        $user->places()->detach($place);

        return back();
    }

    public function existingStore(StoreExistingUserInvitationRequest $request, Place $place)
    {
        $user = User::where('id', $request->user_id)->first();

        $user->places()->detach($place);
        $user->places()->attach($place);

        return back();
    }

    public function newStore(StoreNewUserInvitationsRequest $request, Place $place)
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

            $user->notify(new InviteNewUsersNotification($user, $place));
        }

        return back();
    }
}
