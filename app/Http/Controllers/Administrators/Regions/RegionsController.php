<?php

namespace Genusshaus\Http\Controllers\Administrators\Regions;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Region;

class RegionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth','role:administrator']);
    }

    public function index()
    {
        $regions = Region::all();

        return view('app.administrators.regions.index', compact('regions'));
    }
}
