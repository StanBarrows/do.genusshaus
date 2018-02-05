<?php

namespace Genusshaus\Http\Controllers\Administrators\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\App\Domain\Users\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:supporter']);

    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.supporters.dashboard.index');
    }






}
