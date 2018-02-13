<?php

namespace Genusshaus\Http\Controllers\Administrators\Recommendations;

use Genusshaus\App\Controllers\Controller;

class RecommendationsController extends Controller
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
        return view('app.administrators.recommendations.index');
    }
}
