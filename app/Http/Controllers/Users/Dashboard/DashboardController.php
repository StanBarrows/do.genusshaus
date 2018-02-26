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
       /* $place = Place::first();

        $token_array = $place->favourites->pluck('push_token')->toArray();

        dd($token_array);*/

        $places = auth()->user()->places()->isActive()->get();

        return view('app.users.dashboard.index', compact('places'));
    }
}
