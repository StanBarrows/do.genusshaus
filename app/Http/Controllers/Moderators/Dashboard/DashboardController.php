<?php

namespace Genusshaus\Http\Controllers\Moderators\Dashboard;

use Genusshaus\App\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:moderator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.moderators.dashboard.index');
    }
}
