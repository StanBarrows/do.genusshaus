<?php

namespace Genusshaus\Http\Controllers\Moderators\Invitations;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Moderators\Invitations\StoreInvitationsRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InvitationsController extends Controller
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
    public function index()
    {
        $users = User::inactive()->get();

        return view('app.moderators.invitations.index', compact('users'));
    }

    public function create()
    {
        $places = Place::where('user_id','=',null)->get();

        return view('app.moderators.invitations.create', compact('places'));
    }

    public function store(StoreInvitationsRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(Str::random(16));
        $user->active = false;
        $user->setRememberToken(Str::random(60));
        $user->save();

        $place = Place::find($request->place_id);
        $place->user_id = $user->id;
        $place->save();

        return redirect()->route('moderators.invitations.index');
    }
}
