<?php

namespace Genusshaus\Http\Controllers\Users;

use Genusshaus\App\Controllers\Controller;
use Illuminate\Http\Request;
use Smart6ate\Uploadcare\Models\Uploadcare;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }




}
