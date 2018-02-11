<?php

namespace Genusshaus\Http\Controllers\Moderators\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\User;

class DashboardController extends Controller
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
        $users = User::all();

        return redirect()->route('moderators.invitations.create');

//        return view('app.moderators.dashboard.index', compact('users'));
    }
}
