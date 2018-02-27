<?php

namespace Genusshaus\Http\Controllers\Users\Dashboard;

use Genusshaus\App\Controllers\Controller;

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
        /*
                $arr = array ( 0 => "lorem", 1 => "ipsum", 2 => "dolor");

                $str = implode (', ', $arr);

                dd($str);*/

        $places = auth()->user()->places()->isActive()->get();

        return view('app.users.dashboard.index', compact('places'));
    }
}
