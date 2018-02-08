<?php

namespace Genusshaus\Http\Controllers\Places\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Http\Requests\Places\Places\StorePlacesRequest;

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
