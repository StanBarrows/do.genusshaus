<?php

namespace Genusshaus\Http\Controllers\Administrators;

use Genusshaus\App\Controllers\Controller;
use Illuminate\Http\Request;
use Smart6ate\Uploadcare\Models\Uploadcare;

class AdministratorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','administrator']);

    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.administrators.dashboard.index');
    }






}
