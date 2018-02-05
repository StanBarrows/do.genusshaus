<?php

namespace Genusshaus\Http\Controllers\Places\Regions;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Http\Requests\Places\Regions\StoreRegionsRequest;

class RegionsController extends Controller
{
    public function store(StoreRegionsRequest $request)
    {
        return response(null, 200);
    }
}
