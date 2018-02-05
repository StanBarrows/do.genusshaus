<?php

namespace Genusshaus\Http\Controllers\Places\Regions;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Http\Requests\Places\Regions\StoreRegionsRequest;

class StoreRegionsController extends Controller
{
    public function store(StoreRegionsRequest $request)
    {
        return response(null, 200);
    }
}
