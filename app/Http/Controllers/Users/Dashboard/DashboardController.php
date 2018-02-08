<?php

namespace Genusshaus\Http\Controllers\Users\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::where('user_id',auth()->user()->id)->active()->get();

        return view('app.users.dashboard.index',compact('places'));
    }
}
