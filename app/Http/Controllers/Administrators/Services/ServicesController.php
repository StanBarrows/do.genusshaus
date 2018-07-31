<?php

namespace Genusshaus\Http\Controllers\Administrators\Services;

use Genusshaus\App\Controllers\Controller;

class ServicesController extends Controller
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
        return view('app.administrators.services.index');
    }
}
