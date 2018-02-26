<?php

namespace Genusshaus\Http\Controllers\Places\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {

        return view('app.places.dashboard.index', compact('place'));
    }
}
