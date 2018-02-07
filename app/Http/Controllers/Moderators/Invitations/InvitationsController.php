<?php

namespace Genusshaus\Http\Controllers\Moderators\Invitations;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;
use Genusshaus\Domain\Places\Models\Place;

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
        $places = Place::all();

        return view('app.moderators.invitations.create', compact('places'));
    }
}
