<?php

namespace Genusshaus\Http\Controllers\Administrators\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Region;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('administrators.users.index');

        /*        $regions = Region::all();

               return view('app.administrators.dashboard.index', compact('regions'));*/
    }
}
