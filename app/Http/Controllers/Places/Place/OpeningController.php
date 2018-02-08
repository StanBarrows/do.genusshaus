<?php

namespace Genusshaus\Http\Controllers\Places\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class OpeningController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.place.address.index');
    }
}
