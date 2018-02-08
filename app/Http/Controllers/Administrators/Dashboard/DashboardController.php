<?php

namespace Genusshaus\Http\Controllers\Administrators\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:administrator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return redirect()->route('administrators.users.create');

//        return view('app.administrators.dashboard.index', compact('users'));
    }
}
