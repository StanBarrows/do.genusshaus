<?php

namespace Genusshaus\Http\Controllers\Places\Openings;

use Genusshaus\App\Controllers\Controller;

class OpeningsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.openings.index');
    }
}
