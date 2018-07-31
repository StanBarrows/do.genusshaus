<?php

namespace Genusshaus\Http\Controllers\Moderators\Regions;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Region;

class RegionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
    }

    public function index()
    {
        $regions = Region::with('places')->get();

        return view('app.moderators.regions.index', compact('regions'));
    }
}
