<?php

namespace Genusshaus\Http\Controllers\Places\Dashboard;

use Genusshaus\App\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.dashboard.index');
    }
}
